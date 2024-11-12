<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            'Electronics' => ['Mobile Phones', 'Laptops', 'Tablets', 'Cameras', 'Headphones', 'Smart Watches', 'Gaming Consoles'],
            'Clothing' => ['Men', 'Women', 'Kids', 'Accessories', 'Outerwear'],
            'Accessories' => ['Watches', 'Sunglasses', 'Jewelry', 'Belts'],
            'Documents' => ['Passports', 'ID Cards', 'Certificates', 'Contracts'],
            'Jewelry' => ['Rings', 'Necklaces', 'Bracelets', 'Earrings'],
            'Keys' => ['House Keys', 'Car Keys', 'Office Keys'],
            'Bags' => ['Backpacks', 'Handbags', 'Suitcases', 'Wallets'],
            'Footwear' => ['Casual Shoes', 'Sports Shoes', 'Sandals', 'Boots'],
            'Toys' => ['Action Figures', 'Dolls', 'Educational Toys', 'Puzzles'],
            'Books' => ['Novels', 'Educational', 'Comics', 'Magazines'],
            'Medical' => ['Medications', 'Medical Devices', 'Prescriptions'],
            'Personal Items' => ['Wallets', 'Glasses', 'Umbrellas', 'Cosmetics'],
            'Sports Equipment' => ['Balls', 'Rackets', 'Bats', 'Helmets'],
            'Stationery' => ['Pens', 'Notebooks', 'Markers', 'Folders'],
            'Household Items' => ['Kitchen Utensils', 'Small Appliances', 'Decor Items'],
            'Tools' => ['Power Tools', 'Hand Tools', 'Gardening Tools'],
            'Vehicles' => ['Cars', 'Motorcycles', 'Bicycles', 'Scooters'],
            'Pet Items' => ['Pet Collars', 'Leashes', 'Toys', 'Bowls'],
            'Miscellaneous' => ['Other'],
        ];

        foreach ($subcategories as $categoryName => $subs) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($subs as $sub) {
                    Subcategory::create([
                        'name' => $sub,
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
