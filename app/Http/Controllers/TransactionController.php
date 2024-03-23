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
        $balance = Balance::where('idUser', Auth::user()->id)->pluck('balance')->first();

        return Inertia::render('Transactions/Transactions', ['categories' => $categories, 'transactions' => $transactions, 'balance' => $balance]);
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
            Transaction::create([
                'idUser' => $validatedData['idUser'],
                'idCategory' => $validatedData['idCategory'],
                'date' => $validatedData['date'],
                'total' => $validatedData['total'],
                'desc' => $validatedData['desc'],
                'isATM' => $validatedData['isATM'],
            ]);

            $categoryType = Category::where('id', $validatedData['idCategory'])->value('type');

            // Update saldo ATM jika transaksi terkait dengan ATM
            if ($request->isATM) {
                $userBalance = Balance::where('idUser', $validatedData['idUser'])->first();

                // Pastikan objek Balance tidak null sebelum memperbarui saldo
                if ($userBalance) {
                    if ($categoryType === 'income') {
                        $userBalance->balance += $validatedData['total'];
                    } elseif ($categoryType === 'expense') {
                        $userBalance->balance -= $validatedData['total'];
                    }
                    $userBalance->save();
                } else {
                    // Jika objek Balance tidak ditemukan, buat objek baru
                    Balance::create([
                        'idUser' => $validatedData['idUser'],
                        'balance' => $validatedData['total'],
                    ]);
                }
                return Redirect::route('transactions.index')->with([
                    'message' => [
                        'type' => 'success',
                        'message' => 'Transaction Successfully to Create!'
                    ]
                ]);
            } else {
                return Redirect::route('transactions.index')->with([
                    'message' => [
                        'type' => 'success',
                        'message' => 'Transaction Successfully to Create!'
                    ]
                ]);
            }            
        } catch (\Exception $e) {
            return Redirect::route('transactions.index')->with([
                'message' => [
                    'type' => 'error',
                    'message' => 'Transaction Failed to Create!' . $e->getMessage()
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
            $transaction = Transaction::findOrFail($transaction->id);

            $transaction->update([
                'idUser' => $validatedData['idUser'],
                'idCategory' => $validatedData['idCategory'],
                'date' => $validatedData['date'],
                'total' => $validatedData['total'],
                'desc' => $validatedData['desc'],
                'isATM' => $validatedData['isATM'],
            ]);

            return Redirect::route('transactions.index')->with([
                'message' => [
                    'type' => 'success',
                    'message' => 'Transaction Successfully to Update!'
                ]
            ]);
        } catch (\Exception $e) {
            return Redirect::route('transactions.index')->with([
                'message' => [
                    'type' => 'error',
                    'message' => 'Transaction Failed to Update!' . $e->getMessage()
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

            // Update saldo ATM jika transaksi terkait dengan ATM
            if ($transaction->isATM) {
                $userBalance = Balance::where('idUser', $transaction->idUser)->first();

                // Pastikan objek Balance tidak null sebelum memperbarui saldo
                if ($userBalance) {
                    if ($categoryType === 'income') {
                        $userBalance->balance -= $transaction->total;
                    } elseif ($categoryType === 'expense') {
                        $userBalance->balance += $transaction->total;
                    }
                    $userBalance->save();
                }

                return Redirect::route('transactions.index')->with([
                    'message' => [
                        'type' => 'success',
                        'message' => 'Transaction Successfully to Delete!'
                    ]
                ]);
            } else {
                return Redirect::route('transactions.index')->with([
                    'message' => [
                        'type' => 'success',
                        'message' => 'Transaction Successfully to Delete!'
                    ]
                ]);
            }
        } catch (\Exception $e) {
            return Redirect::route('transactions.index')->with([
                'message' => [
                    'type' => 'error',
                    'message' => 'Transaction Failed to Delete!' . $e->getMessage()
                ]
            ]);
        }
    }
}