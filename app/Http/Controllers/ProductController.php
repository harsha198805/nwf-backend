<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\Admin\ProductService;
use App\Services\Admin\CategoryService;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $paginationLimit = 10;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = $this->productService->getAllProducts($search, $this->paginationLimit);
        return view('admin.products.index', compact('products'));
    }

    public function getdata(Request $request)
    {
        $search = $request->input('search');
        $products = $this->productService->getAllProducts($search, $this->paginationLimit);
        return response()->json(['products' => $products]);
    }

    public function getCategoryList()
    {
        $where = ["status" => 1];
        $orderby['column'] = 'name';
        $orderby['sort'] = 'asc';
        $categories = $this->categoryService->getCategoryListFilter($where, $orderby, $columns=['*']);
        return response()->json($categories);
    }

    public function addNewCategory(Request $request)
    {
        $validationErrors = $this->categoryService->validateCategory($request->all());

        if ($validationErrors) {
            return response()->json(['errors' => $validationErrors]);
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
        ];
        $category = $this->categoryService->createCategory($data);

        return response()->json(['success' => 'Category created successfully', 'new_category_id' => $category->id]);
    }

    public function store(Request $request)
    {
        $validationErrors = $this->productService->validateproduct($request->all());

        if ($validationErrors) {
            return response()->json(['errors' => $validationErrors]);
        }

        $this->productService->createProduct($request);
        return response()->json(['success' => 'Product created successfully!']);
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        if ($product) {
            return response()->json(['product' => $product]);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($request, $id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(['success' => 'Product updated successfully!']);
    }

    public function destroy($id)
    {
        $deleted = $this->productService->deleteProduct($id);
        if (!$deleted) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(['success' => 'Product deleted successfully']);
    }

    public function updateStatus(Request $request)
    {
        $product = $this->productService->getProductById($request->id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
}
