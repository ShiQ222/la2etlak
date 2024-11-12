<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Specify which fields are fillable
    protected $fillable = [
        'title',
        'description',
        'location',
        'date',
        'status',
        'user_id',
        'category_id',
        'subcategory_id',
        'image_url',
        'is_claimed',
        'views',
        'highlighted',
    ];

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Define relationship with User (if an item is associated with a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
