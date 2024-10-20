<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use App\Models\Books;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Books::factory(100)->create();

        // BookCategory::create([
        //     'category_name' => 'ajsojao',
        // ]);
    }
}
