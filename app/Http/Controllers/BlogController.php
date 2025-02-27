<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\BlogService;

class BlogController extends Controller
 {
//     protected $categoryService;
//     protected $paginationLimit = 10;

//     public function __construct(CategoryService $categoryService)
//     {
//         $this->middleware('auth');
//         $this->categoryService = $categoryService;
//     }

//     public function index(Request $request)
//     {
//         $search = $request->input('search');
//         $paginate = 10;
//         $categories = $this->categoryService->getAllCategories($search, $this->paginationLimit);

//         return view('categories.index', compact('categories'));
//     }

//     public function getdata(Request $request)
//     {
//         $search = $request->input('search');
//         $categories = $this->categoryService->getAllCategories($search, $this->paginationLimit);

//         return response()->json(['categories' => $categories]);
//     }

//     public function store(Request $request)
//     {
//         $validationErrors = $this->categoryService->validateCategory($request->all());

//         if ($validationErrors) {
//             return response()->json(['errors' => $validationErrors]);
//         }

//         $fileName = $this->handleFileUpload($request);

//         $data = $request->all();
//         $data['image'] = $fileName;
//         $this->categoryService->createCategory($data);

//         return response()->json(['success' => 'Category created successfully']);
//     }


//     public function edit($id)
//     {
//         $category = Category::find($id);

//         if ($category) {
//             return response()->json(['category' => $category]);
//         }

//         return response()->json(['error' => 'Category not found'], 404);
//     }

//     public function update(Request $request, $id)
//     {
//         $validationErrors = $this->categoryService->validateCategory($request->all(), $id);

//         if ($validationErrors) {
//             return response()->json(['errors' => $validationErrors]);
//         }

//         $fileName = $this->handleFileUpload($request);

//         $data = $request->all();
//         $data['image'] = $fileName;
//         $this->categoryService->updateCategory($id, $data);

//         return response()->json(['success' => 'Category updated successfully']);
//     }

//     public function destroy($id)
//     {

//         $isCategoryUsedInProducts = $this->categoryService->isCategoryUsedInProducts($id);
//         if ($isCategoryUsedInProducts) {
//             $attributes = ['id' => $id];
//             $data = ['status' => 0];
//             $result = $this->categoryService->updateStatus($attributes, $data);
//             return response()->json(['success' => "Category is used in Product.\n Category is Inactive"]);
//         } else {
//             $category = $this->categoryService->findCategoryById($id);

//             $deleteCategory = $this->categoryService->deleteCategory($id);
//             if ($deleteCategory) {
//                 if ($category->image && file_exists(public_path('uploads/category/' . $category->image))) {
//                     unlink(public_path('uploads/category/' . $category->image));
//                 }
//             }

//             return response()->json(['success' => 'Category deleted successfully']);
//         }
//     }

//     public function updateStatus(Request $request)
//     {
//         $this->validate($request, [
//             'status' => 'required|in:1,0',
//         ]);

//         $attributes = ['id' => $request->id];
//         $data = ['status' => $request->status];
//         $result = $this->categoryService->updateStatus($attributes, $data);
//         if (!$result) {
//             return response()->json(['error' => 'Failed to update category status'], 500);
//         }

//         return response()->json(['success' => 'Status updated successfully']);
//     }

//     private function handleFileUpload(Request $request)
//     {
//         if ($request->hasFile('image')) {
//             $file = $request->file('image');
//             $extension = $file->getClientOriginalExtension();
//             $fileName = time() . '_' . mt_rand(100000, 999999) . '.' . $extension;
//             $file->move(public_path('uploads/category'), $fileName);
//             return $fileName;
//         }
//         return null;
//     }
}
