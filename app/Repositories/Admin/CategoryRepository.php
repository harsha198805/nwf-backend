<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;

class CategoryRepository
{
    public function getAllCategories($search = null, $paginate = null)
    {
        try {
            $query = Category::query();
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }
            return $query->orderBy('created_at', 'desc')->paginate($paginate);
        } catch (QueryException $e) {
            throw new Exception("Error fetching categories: " . $e->getMessage());
        }
    }

    public function findCategoryById($id)
    {
        try {
            return Category::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new Exception("Category not found: " . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Error finding category: " . $e->getMessage());
        }
    }

    public function createCategory($data)
    {
        try {
            return Category::create($data);
        } catch (QueryException $e) {
            throw new Exception("Error creating category: " . $e->getMessage());
        }
    }

    public function updateCategory($category, $data)
    {
        try {
            return $category->update($data);
        } catch (QueryException $e) {
            throw new Exception("Error updating category: " . $e->getMessage());
        }
    }

    public function deleteCategory($category)
    {
        try {
            return $category->delete();
        } catch (QueryException $e) {
            throw new Exception("Error deleting category: " . $e->getMessage());
        }
    }

    public function updateStatus($attributes, $data)
    {
        try {
            return Category::where($attributes)->update($data);
        } catch (Exception $exception) {
            \Log::error('Error updating category status', ['error' => $exception->getMessage()]);
            return false;
        }
    }
    public function isCategoryUsedInProducts($categoryId)
    {
        return Product::where('category_id', $categoryId)
            ->exists();
    }
}
