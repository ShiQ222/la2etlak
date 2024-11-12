<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Subcategory;

class ItemController extends Controller
{
    // Display all items
    public function index()
    {
        $items = Item::all(); // Retrieve all items
        return view('items.index', compact('items')); // Pass items to the view
    }

    // Display only lost items
    public function showLost()
    {
        $items = Item::where('status', 'lost')->get(); // Retrieve only lost items
        return view('items.lost', compact('items')); // Pass lost items to the view
    }

    // Display only found items
    public function showFound()
    {
        $items = Item::where('status', 'found')->get(); // Retrieve only found items
        return view('items.found', compact('items')); // Pass found items to the view
    }

    // Display items by category
    public function category($category)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $items = Item::where('category_id', $category->id)->get(); // Filter items by category

        return view('items.category', compact('items', 'category')); // Pass items and category to the view
    }

    // Display items by category and subcategory
    public function subcategory($category, $subcategory)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $subcategory = Subcategory::where('name', $subcategory)
            ->where('category_id', $category->id)
            ->firstOrFail();

        $items = Item::where('category_id', $category->id)
            ->where('subcategory_id', $subcategory->id)
            ->get(); // Filter items by category and subcategory

        return view('items.subcategory', compact('items', 'category', 'subcategory')); // Pass items, category, and subcategory to the view
    }
	
}
