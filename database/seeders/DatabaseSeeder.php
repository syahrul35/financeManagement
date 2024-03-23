<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\User;
use App\Models\Category;
use App\Models\CategoryPreferences;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin1234',
            'isAdmin' => true
        ]);

        $this->call(CategorySeeder::class);

        // Membuat kategori preferensi default untuk pengguna admin
        $categories = Category::whereBetween('id', [1, 20])->get();
        foreach ($categories as $category) {
            CategoryPreferences::create([
                'idUser' => $admin->id,
                'idCategory' => $category->id,
            ]);
        }

    }
}
