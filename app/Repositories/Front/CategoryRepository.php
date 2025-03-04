<?php

namespace App\Repositories\Front;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::where('status', 1)->get();
    }
    public function getAllWithProducts()
    {
        return Category::with('products')->get();
    }
}
