<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function getdata(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }
        $products = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json([
            'products' => $products,
        ]);
    }

    public function getCategoryList()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();
        return response()->json($categories);
    }

    public function addNewCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug',
            'status' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Category created successfully', 'new_category_id' => $category->id]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'slug' => 'required|string|unique:products,slug',
            'product_price' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'tags' => 'nullable|string',
            'product_weight' => 'nullable|numeric',
            'new_arrivals' => 'nullable|boolean',  // accepts true/false or 0/1
            'featured' => 'nullable|boolean',      // accepts true/false or 0/1
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image_1' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'focus_keywords' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = $request->all();
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . mt_rand(100000, 999999) . '.' . $extension;
                $file->move(public_path('uploads/products'), $filename);
            } else {
                $filename = null;
            }
            $data[$imageField] = $filename;
        }
        $newArrivals = $request->has('new_arrivals') ? 1 : 0;
        $featured = $request->has('featured') ? 1 : 0;
        $data['new_arrivals'] = $newArrivals;
        $data['featured'] = $featured;
        Product::create($data);

        return response()->json(['success' => 'Product created successfully!']);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json(['product' => $product]);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }


    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'product_price' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'tags' => 'nullable|string',
            'product_weight' => 'nullable|numeric',
            'new_arrivals' => 'nullable|boolean',  // accepts true/false or 0/1
            'featured' => 'nullable|boolean',      // accepts true/false or 0/1
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'focus_keywords' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        foreach ([$product->image_1, $product->image_2, $product->image_3, $product->image_4] as $imageField) {
            if ($imageField && file_exists(public_path('uploads/products/' . $imageField))) {
                unlink(public_path('uploads/products/' . $imageField));
            }
        }

        $data = $request->all();
        $imageFields = ['image_1', 'image_2', 'image_3', 'image_4'];

        foreach ($imageFields as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($product->$imageField && file_exists(public_path('uploads/products/' . $product->$imageField))) {
                    unlink(public_path('uploads/products/' . $product->$imageField));
                }

                $file = $request->file($imageField);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . mt_rand(100000, 999999) . '.' . $extension;
                $file->move(public_path('uploads/products'), $filename);
                $data[$imageField] = $filename;
            } else {
                $data[$imageField] = $product->$imageField;
            }
        }
        $newArrivals = $request->has('new_arrivals') ? 1 : 0;
        $featured = $request->has('featured') ? 1 : 0;
        $data['new_arrivals'] = $newArrivals;
        $data['featured'] = $featured;
        $product->update($data);

        return response()->json(['success' => 'Product created successfully!']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        foreach ([$product->image_1, $product->image_2, $product->image_3, $product->image_4] as $imageField) {
            if ($imageField && file_exists(public_path('uploads/products/' . $imageField))) {
                unlink(public_path('uploads/products/' . $imageField));
            }
        }

        $product->delete();
        return response()->json(['success' => 'Product deleted successfully']);
    }

    public function updateStatus(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        try {
            $product->status = $request->status;
            $product->save();
            return response()->json(['success' => 'Status updated successfully.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }
    }
}
