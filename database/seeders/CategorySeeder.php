<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Salary', 'type' => 'income'],
            ['title' => 'Bonus', 'type' => 'income'],
            ['title' => 'Overtime', 'type' => 'income'],
            ['title' => 'Food & Drinks', 'type' => 'expenses'],
            ['title' => 'Shopping', 'type' => 'expenses'],
            ['title' => 'Housing', 'type' => 'expenses'],
            ['title' => 'Transportation', 'type' => 'expenses'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
