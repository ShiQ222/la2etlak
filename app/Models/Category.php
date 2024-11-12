<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify which fields are fillable to allow mass assignment
    protected $fillable = ['name'];

    // If you have relationships, you can add them here
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}