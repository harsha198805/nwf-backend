<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $categories = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('categories.index', compact('categories'));
    }
    public function getdata(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }
        $categories = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json([
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . mt_rand(100000, 999999) . '.' . $extension;
            $file->move(public_path('uploads/category'), $fileName);
        } else {
            $fileName = null;
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Category created successfully']);
    }


    public function edit($id)
    {
        $category = Category::find($id);

        if ($category) {
            return response()->json(['category' => $category]);
        }

        return response()->json(['error' => 'Category not found'], 404);
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path('uploads/category/' . $category->image))) {
                unlink(public_path('uploads/category/' . $category->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . mt_rand(100000, 999999) . '.' . $extension;
            $file->move(public_path('uploads/category'), $fileName);
        } else {
            $fileName = $category->image;
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Category updated successfully']);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        if ($category->image && file_exists(public_path('uploads/category/' . $category->image))) {
            unlink(public_path('uploads/category/' . $category->image));
        }

        $category->delete();
        return response()->json(['success' => 'Category deleted successfully']);
    }

    public function updateStatus(Request $request)
    {
        $category = Category::find($request->id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        try {
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => 'Status updated successfully.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Category not found']);
        }
    }
}
