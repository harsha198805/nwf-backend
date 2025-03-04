<?php

namespace App\Repositories\Front;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepository
{
    public function getProductBySlug($slug)
    {
        try {
            $product = Product::with(['category'])->where('slug', $slug)
                ->where('status', 1)
                ->first();
            return $product;
        } catch (QueryException $e) {
            throw new \Exception("Database query error: " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("An error occurred while fetching the product: " . $e->getMessage());
        }
    }

    public function findByCategoryExcludingProduct($categoryId, $excludeProductId, $take = null)
    {
        try {
            $query = Product::with(['category'])->where('category_id', $categoryId)
                ->where('id', '!=', $excludeProductId);

            if (!empty($take)) {
                $query = $query->take($take);
            }

            return $query->get();
        } catch (\Exception $e) {
            // \Log::error('Error fetching similar products: ' . $e->getMessage());

            return collect();
        }
    }
}
