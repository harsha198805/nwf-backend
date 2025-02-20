<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // This method will show products page
    public function index1() {
        $products = Product::orderBy('created_at','DESC')->paginate(5);

        return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index(Request $request)
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
    public function create() {
        $category = Category::orderBy('name','ASC')->get();
        return view('products.create', compact('category'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',

            'slug' => 'required|string|unique:products,slug',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'tags' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'new_arrivals' => 'nullable|boolean',
            'featured_products' => 'nullable|boolean',
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

        // Handle file uploads
        $data = $request->all();
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)->store('products', 'public');
            }
        }

        $data['slug'] = Str::slug($request->input('name'), '-');

        // Save the product
        Product::create($data);

        return response()->json(['success' => 'Product created successfully!']);
    }
    // This method will store a product in db
    public function store11(Request $request) {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',           
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);

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
            $imageName = time().'.'.$ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'),$imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }        

        return redirect()->route('products.index')->with('success','Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // This method will show edit product page
    public function edit($id) {
        $product = Product::findOrFail($id);
        $category = Category::orderBy('name','ASC')->get();
        return view('products.edit', compact('product','category'));
    }

    // This method will update a product
    public function update($id, Request $request) {

        $product = Product::findOrFail($id);

        $rules = [
            'category_id' => 'required',
            'name' => 'required|min:5',
            'price' => 'required|numeric'            
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
        }

        // here we will update product
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {

            // delete old image
            File::delete(public_path('uploads/products/'.$product->image));

            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'),$imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }        

        return redirect()->route('products.index')->with('success','Product updated successfully.');
    }

    // This method will delete a product
    public function destroy($id) {
        $product = Product::findOrFail($id);

       // delete image
       File::delete(public_path('uploads/products/'.$product->image));

       // delete product from database
       $product->delete();

       return redirect()->route('products.index')->with('success','Product deleted successfully.');
    }
}
