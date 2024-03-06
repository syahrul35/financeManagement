<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        return Inertia::render('Transactions/Transactions', ['categories' => $categories, 'transactions' => $transactions]);
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
            $newtransaction = Transaction::create([
                'idUser' => $validatedData['idUser'],
                'idCategory' => $validatedData['idCategory'],
                'date' => $validatedData['date'],
                'total' => $validatedData['total'],
                'desc' => $validatedData['desc'],
                'isATM' => $validatedData['isATM'],
            ]);

            return Redirect::route('transactions.index')->with('message', 'Transaction Successfully Created!');
        } catch (\Throwable $th) {
            return Redirect::route('transactions.index')->with('message', 'Transaction Failed to Create!')->withErrors(['error' => $th->getMessage()]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
