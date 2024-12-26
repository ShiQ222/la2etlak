<?php

namespace App\Http\Controllers\Items;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;


class ItemController extends Controller
{
    // Display all items with pagination
    public function index()
    {
        $items = Item::paginate(9); // Retrieve items with pagination
        return view('items.index', compact('items'));
    }

    // Display only lost items with pagination
    public function showLost()
    {
        $items = Item::where('status', 'lost')->paginate(9); // Paginate lost items
        return view('items.lost', compact('items')); // Pass lost items to the view
    }

    // Display only found items with pagination
    public function showFound()
    {
        $items = Item::where('status', 'found')->paginate(9); // Paginate found items
        return view('items.found', compact('items')); // Pass found items to the view
    }

    // Display items by category with pagination
    public function category($category)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $items = Item::where('category_id', $category->id)->paginate(9); // Paginate items by category

        return view('items.category', compact('items', 'category')); // Pass items and category to the view
    }

    // Display items by category and subcategory with pagination
    public function subcategory($category, $subcategory)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $subcategory = Subcategory::where('name', $subcategory)
            ->where('category_id', $category->id)
            ->firstOrFail();

        $items = Item::where('category_id', $category->id)
            ->where('subcategory_id', $subcategory->id)
            ->paginate(9); // Paginate items by category and subcategory

        return view('items.subcategory', compact('items', 'category', 'subcategory')); // Pass items, category, and subcategory to the view
    }

    // Display a single item by its ID
    public function show($id)
    {
        $item = Item::with(['category', 'subcategory'])->findOrFail($id); // Retrieves item by ID along with category and subcategory
        return view('items.show', compact('item')); // Pass the item data to the view
    }
}