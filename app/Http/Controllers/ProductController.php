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
        return view('products.index', compact('products'));
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
    // This method will show products page
    public function index1()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index111(Request $request)
    {
        // Fetch all categories for the filter
        $categories = Category::all();

        // Retrieve filter values from the request
        $searchTerm = $request->input('search');
        $categoryFilter = $request->input('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Start building the query
        $products = Product::query();

        // Apply search by product name
        if ($searchTerm) {
            $products->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Apply category filter
        if ($categoryFilter) {
            $products->where('category_id', $categoryFilter);
        }

        // Apply price range filter
        if ($minPrice && $maxPrice) {
            $products->whereBetween('price', [$minPrice, $maxPrice]);
        } elseif ($minPrice) {
            $products->where('price', '>=', $minPrice);
        } elseif ($maxPrice) {
            $products->where('price', '<=', $maxPrice);
        }

        // Get the filtered products with pagination
        $products = $products->paginate(10);

        return view('products.index', compact('products', 'categories', 'searchTerm', 'categoryFilter', 'minPrice', 'maxPrice'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // This method will show create product page
    public function create()
    {
        $category = Category::orderBy('name', 'ASC')->get();
        return view('products.create', compact('category'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'slug' => 'required|string|unique:products,slug',
            'product_price' => 'numeric',
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
    // This method will store a product in db
    public function store11(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        // here we will insert product in db
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // This method will show edit product page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::orderBy('name', 'ASC')->get();
        return view('products.edit', compact('product', 'category'));
    }

    // This method will update a product
    public function update($id, Request $request)
    {

        $product = Product::findOrFail($id);

        $rules = [
            'category_id' => 'required',
            'name' => 'required|min:5',
            'price' => 'required|numeric'
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withInput()->withErrors($validator);
        }

        // here we will update product
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {

            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));

            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
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
