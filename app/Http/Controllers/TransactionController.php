<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $transactions = Transaction::all();
        $balance = Balance::where('idUser', Auth::user()->id)->first();

        return Inertia::render('Transactions/Transactions', [
            'categories' => $categories,
            'transactions' => $transactions,
            'balance' => [
                'atm_balance' => $balance->atm_balance,
                'physical_money' => $balance->physical_money,
                'total_balance' => $balance->total_balance,
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'idUser' => 'required',
            'idCategory' => 'required',
            'date' => 'required|date',
            'total' => 'required|numeric',
            'desc' => 'nullable|string',
            'isATM' => 'nullable|boolean',
        ]);

        try {
            Transaction::create($validatedData);

            $categoryType = Category::where('id', $validatedData['idCategory'])->value('type');
            $userBalance = Balance::where('idUser', $validatedData['idUser'])->first();

            if (!$userBalance) {
                $userBalance = Balance::create([
                    'idUser' => $validatedData['idUser'],
                    'atm_balance' => 0,
                    'physical_money' => 0,
                    'total_balance' => 0,
                ]);
            }

            if ($validatedData['isATM']) {
                if ($categoryType === 'income') {
                    $userBalance->atm_balance += $validatedData['total'];
                } elseif ($categoryType === 'expense') {
                    $userBalance->atm_balance -= $validatedData['total'];
                }
            } else {
                if ($categoryType === 'income') {
                    $userBalance->physical_money += $validatedData['total'];
                } elseif ($categoryType === 'expense') {
                    $userBalance->physical_money -= $validatedData['total'];
                }
            }

            // Update total_balance
            $userBalance->total_balance = $userBalance->atm_balance + $userBalance->physical_money;
            $userBalance->save();

            return redirect()->route('transactions.index')->with([
                'message' => [
                    'type' => 'success',
                    'message' => 'Transaction Successfully Created!'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with([
                'message' => [
                    'type' => 'error',
                    'message' => 'Transaction Failed to Create! ' . $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
{
    // Validate request data
    $validatedData = $request->validate([
        'idUser' => 'required',
        'idCategory' => 'required',
        'date' => 'required|date',
        'total' => 'required|numeric',
        'desc' => 'nullable|string',
        'isATM' => 'nullable|boolean',
    ]);

    try {
        // Retrieve the transaction by ID
        $transaction = Transaction::findOrFail($transaction->id);

        // Calculate the difference in the total amount
        $totalDifference = $validatedData['total'] - $transaction->total;

        // Check if transaction status has changed
        $statusChanged = $validatedData['isATM'] != $transaction->isATM;

        // Update user balance if transaction is related to ATM
        $userBalance = Balance::where('idUser', $validatedData['idUser'])->first();

        if ($userBalance) {
            if ($statusChanged) {
                // Transaksi asli dan yang diperbarui terkait dengan ATM berbeda
                if ($transaction->isATM) {
                    // Transaksi awal tidak terkait dengan ATM, diubah menggunakan ATM
                    $userBalance->atm_balance += $transaction->total;
                    $userBalance->physical_money -= $transaction->total;
                } else {
                    // Transaksi awal terkait dengan ATM, diubah tidak menggunakan ATM
                    $userBalance->atm_balance -= $transaction->total;
                    $userBalance->physical_money += $transaction->total;
                }
            } else {
                // Kedua transaksi terkait dengan ATM atau tidak
                if ($validatedData['isATM']) {
                    // Transaksi terkait dengan ATM
                    $userBalance->atm_balance += $totalDifference;
                } else {
                    // Transaksi tidak terkait dengan ATM
                    $userBalance->physical_money += $totalDifference;
                }
            }

            // Update total_balance
            $userBalance->total_balance = $userBalance->atm_balance + $userBalance->physical_money;
            $userBalance->save();
        }

        // Update the transaction
        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with([
            'message' => [
                'type' => 'success',
                'message' => 'Transaction Successfully Updated!'
            ]
        ]);
    } catch (\Exception $e) {
        return redirect()->route('transactions.index')->with([
            'message' => [
                'type' => 'error',
                'message' => 'Transaction Failed to Update! ' . $e->getMessage()
            ]
        ]);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        try {
            $transaction = Transaction::findOrFail($transaction->id);
            $transaction->delete();

            $categoryType = Category::where('id', $transaction->idCategory)->value('type');

            // Update balance if the transaction is related to ATM or physical money
            $userBalance = Balance::where('idUser', $transaction->idUser)->first();

            if ($userBalance) {
                if ($transaction->isATM) {
                    if ($categoryType === 'income') {
                        // Decrease ATM balance for income transaction
                        $userBalance->atm_balance -= $transaction->total;
                    } elseif ($categoryType === 'expense') {
                        // Increase ATM balance for expense transaction
                        $userBalance->atm_balance += $transaction->total;
                    }
                } else {
                    if ($categoryType === 'income') {
                        // Increase physical money balance for income transaction
                        $userBalance->physical_money -= $transaction->total;
                    } elseif ($categoryType === 'expense') {
                        // Decrease physical money balance for expense transaction
                        $userBalance->physical_money += $transaction->total;
                    }
                }
                // Update total_balance
                $userBalance->total_balance = $userBalance->atm_balance + $userBalance->physical_money;
                $userBalance->save();
            }

            return redirect()->route('transactions.index')->with([
                'message' => [
                    'type' => 'success',
                    'message' => 'Transaction Successfully Deleted!'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with([
                'message' => [
                    'type' => 'error',
                    'message' => 'Transaction Failed to Delete! ' . $e->getMessage()
                ]
            ]);
        }
    }
}