<?php

namespace App\Services\Front;

use App\Repositories\Front\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }
    public function getAllCategoriesWithImage()
    {
        return $this->categoryRepository->getAllCategoriesWithImage();
    }
    public function getCategoriesWithProducts()
    {
        return $this->categoryRepository->getAllWithProducts();
    }
}
