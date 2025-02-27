<?php

namespace App\Repositories\Admin;

use App\Models\Blog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;

class BlogRepository
{
    public function getAllBlogs($search = null, $paginate = null)
    {
        try {
            $query = Blog::query();
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }
            return $query->orderBy('created_at', 'desc')->paginate($paginate);
        } catch (QueryException $e) {
            throw new Exception("Error fetching blog: " . $e->getMessage());
        }
    }

    public function findBlogById($id)
    {
        try {
            return Blog::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new Exception("Blog not found: " . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Error finding blog: " . $e->getMessage());
        }
    }

    public function createBlog($data)
    {
        try {
            return Blog::create($data);
        } catch (QueryException $e) {
            throw new Exception("Error creating blog: " . $e->getMessage());
        }
    }

    public function updateBlog($blog, $data)
    {
        try {
            return $blog->update($data);
        } catch (QueryException $e) {
            throw new Exception("Error updating blog: " . $e->getMessage());
        }
    }

    public function deleteBlog($blog)
    {
        try {
            return $blog->delete();
        } catch (QueryException $e) {
            throw new Exception("Error deleting blog: " . $e->getMessage());
        }
    }

    public function updateStatus($attributes, $data)
    {
        try {
            return Blog::where($attributes)->update($data);
        } catch (Exception $exception) {
            \Log::error('Error updating blog status', ['error' => $exception->getMessage()]);
            return false;
        }
    }
}
