<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert categories for Income
        Category::create([
            'categoryName' => 'Salary',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Bonus',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Commission',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Rental Income',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Dividends',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Interest Income',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Capital Gains',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Freelancing',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Invesment Returns',
            'type' => 'Income',
        ]);

        Category::create([
            'categoryName' => 'Gifts',
            'type' => 'Income',
        ]);
        // end insert category for Income

        // ----------------------------------------------------------------- //

        // insert category for Expense
        Category::create([
            'categoryName' => 'Food & Dinning',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Transportation',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Housing',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Utilities',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Health & Fitness',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Education',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Entertainment',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Clothing',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Insurance',
            'type' => 'Expense',
        ]);

        Category::create([
            'categoryName' => 'Debt Payments',
            'type' => 'Expense',
        ]);
        // end insert category for Expense
    }
}
