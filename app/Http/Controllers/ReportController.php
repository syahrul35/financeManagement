<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Inertia\Inertia;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $month = $request->query('month', Carbon::now()->month); // Default ke bulan sekarang
        // dd($month);
        $year = $request->query('year', Carbon::now()->year); // Default ke tahun sekarang

        $incomeData = Transaction::whereHas('category', function ($query) {
            $query->where('type', 'income'); // Hanya kategori dengan tipe income
        })
        ->whereYear('date', $year)
        ->whereMonth('date', $month)
        ->selectRaw('idCategory, SUM(total) as total')
        ->groupBy('idCategory')
        ->with('category')
        ->get();

        $expenseData = Transaction::whereHas('category', function ($query) {
            $query->where('type', 'expense');
        })
        ->whereYear('date', $year)
        ->whereMonth('date', $month)
        ->selectRaw('idCategory, SUM(total) as total')
        ->groupBy('idCategory')
        ->with('category')
        ->get();

        return Inertia::render('Report/Report', [
            'incomeChartData' => [
                'labels' => $incomeData->pluck('category.categoryName'),
                'data' => $incomeData->pluck('total'),
            ],
            'expenseChartData' => [
                'labels' => $expenseData->pluck('category.categoryName'),
                'data' => $expenseData->pluck('total'),
            ]
        ]);

        // return Inertia::render('Report/Report');
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
        //
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
