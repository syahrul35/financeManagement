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
        // Insert categories for income
        Category::create([
            'categoryName' => 'Salary',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Bonus',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Commission',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Rental Income',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Dividends',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Interest Income',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Capital Gains',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Freelancing',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Invesment Returns',
            'type' => 'income',
        ]);

        Category::create([
            'categoryName' => 'Gifts',
            'type' => 'income',
        ]);
        // end insert category for income

        // ----------------------------------------------------------------- //

        // insert category for expense
        Category::create([
            'categoryName' => 'Food & Dinning',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Transportation',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Housing',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Utilities',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Health & Fitness',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Education',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Entertainment',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Clothing',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Insurance',
            'type' => 'expense',
        ]);

        Category::create([
            'categoryName' => 'Debt Payments',
            'type' => 'expense',
        ]);
        // end insert category for expense
    }
}
