<?php

namespace App\Repositories\Front;

use App\Models\Category;
use Exception;

class CategoryRepository
{
    public function getAllCategories()
    {
        try {
            return Category::where('status', 1)->get();
        } catch (Exception $e) {
            // \Log::error('Error fetching categories: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to retrieve categories at the moment.'], 500);
        }
    }
    public function getAllCategoriesWithImage()
    {
        try {
            return Category::where('status', 1)
            ->whereNotNull('image')
            ->get();
        } catch (Exception $e) {
            // \Log::error('Error fetching categories: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to retrieve categories at the moment.'], 500);
        }
    }

    public function getAllWithProducts()
    {
        try {
            $categories = Category::with(['products' => function ($query) {
                $query->where('status', 1);
            }])
                ->whereHas('products', function ($query) {
                    $query->where('status', 1);
                }, '>=', 1)
                ->get();
            return $categories;
        } catch (Exception $e) {
            // \Log::error('Error fetching categories with products: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to retrieve categories and products at the moment.'], 500);
        }
    }
}
