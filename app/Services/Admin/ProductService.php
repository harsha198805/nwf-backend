<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts($search, $paginate = null)
    {
        return $this->productRepository->getAllProducts($search, $paginate);
    }

    public function getProductById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function validateProduct($data, $productId = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'slug' => 'required|string|unique:products,slug' . ($productId ? ',' . $productId : ''),
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
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return null;
    }

    public function createProduct(Request $request)
    {
        $data = $this->prepareProductData($request);
        return $this->productRepository->create($data);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = $this->productRepository->findById($id);
        if (!$product) {
            return null;
        }

        $data = $this->prepareProductData($request, $product);
        return $this->productRepository->update($product, $data);
    }

    public function deleteProduct($id)
    {
        $product = $this->productRepository->findById($id);
        if (!$product) {
            return null;
        }

        $this->deleteProductImages($product);
        return $this->productRepository->delete($product);
    }

    private function prepareProductData(Request $request, $product = null)
    {
        $data = $request->all();
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($product && $product->$imageField && file_exists(public_path('uploads/products/' . $product->$imageField))) {
                    unlink(public_path('uploads/products/' . $product->$imageField));
                }

                $file = $request->file($imageField);
                $filename = time() . '_' . mt_rand(100000, 999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products'), $filename);
                $data[$imageField] = $filename;
            } elseif (!$product || !$product->$imageField) {
                $data[$imageField] = null;
            }
        }

        $data['new_arrivals'] = $request->has('new_arrivals') ? 1 : 0;
        $data['featured'] = $request->has('featured') ? 1 : 0;

        return $data;
    }

    private function deleteProductImages(Product $product)
    {
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($product->$imageField && file_exists(public_path('uploads/products/' . $product->$imageField))) {
                unlink(public_path('uploads/products/' . $product->$imageField));
            }
        }
    }
}
