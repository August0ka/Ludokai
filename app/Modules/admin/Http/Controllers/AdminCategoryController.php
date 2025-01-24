<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\admin\Http\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}

    public function index()
    {
        $categories = $this->categoryRepository->fetchAll();

        return view('admin.categories.index', compact('categories'));
    }
}
