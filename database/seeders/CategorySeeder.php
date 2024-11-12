<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed categories
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Clothing']);
        Category::create(['name' => 'Accessories']);
        Category::create(['name' => 'Documents']);
        Category::create(['name' => 'Jewelry']);
        Category::create(['name' => 'Keys']);
        Category::create(['name' => 'Bags']);
        Category::create(['name' => 'Footwear']);
        Category::create(['name' => 'Toys']);
        Category::create(['name' => 'Books']);
        Category::create(['name' => 'Medical']);
        Category::create(['name' => 'Personal Items']);
        Category::create(['name' => 'Sports Equipment']);
        Category::create(['name' => 'Stationery']);
        Category::create(['name' => 'Household Items']);
        Category::create(['name' => 'Tools']);
        Category::create(['name' => 'Vehicles']);
        Category::create(['name' => 'Pet Items']);
        Category::create(['name' => 'Miscellaneous']);
    }
}
