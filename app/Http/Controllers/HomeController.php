<?php

namespace App\Http\Controllers;

use App\Services\Front\CategoryService;

class HomeController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categoriesList = $this->categoryService->getAllCategories();
        $categories = $this->categoryService->getCategoriesWithProducts();
        return view('home', compact('categories','categoriesList'));
    }
}
