<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\admin\Http\Repositories\CategoryRepository;
use App\Modules\admin\Http\Requests\AdminCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;

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

    public function create()
    {
        $categories = $this->categoryRepository->pluck();

        return view('admin.categories.form', compact('categories'));
    }

    public function store(AdminCategoryRequest $request)
    {
        $inputs = $request->validated();

        $this->categoryRepository->create($inputs);

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        $categories = $this->categoryRepository->pluck();

        return view('admin.categories.form', compact('category', 'categories'));
    }

    public function update(AdminCategoryRequest $request, category $category)
    {
        $inputs = $request->validated();

        $this->categoryRepository->update($inputs, $category->id);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->delete($category->id);

            return response()->json(['success' => true, 'message' => 'Categoria deletada com sucesso']);
        } catch (Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
