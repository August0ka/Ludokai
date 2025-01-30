<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\admin\Http\Repositories\CategoryRepository;
use App\Modules\site\Http\Repositories\ProductRepository;
use App\Modules\admin\Http\Requests\AdminProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AdminProductController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
    ) {}

    public function index()
    {
        $products = $this->productRepository->fetchAll();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->pluck();

        return view('admin.products.form', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $inputs = $request->validated();

        $mainImage = $request->file('main_image');
        dd($mainImage);
        Storage::disk('public')->put('product_main_images', $mainImage);

        $productImages = $request->file('product_images');
        foreach ($productImages as $productImage) {
            Storage::disk('public')->put('product_secondary_images', $productImage);
        }

        $this->productRepository->create($inputs);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->pluck();

        return view('admin.products.form', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, product $product)
    {
        $inputs = $request->validated();

        $this->productRepository->update($inputs, $product->id);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        try {
            $this->productRepository->delete($product->id);

            return response()->json(['success' => true, 'message' => 'Produto deletado com sucesso']);
        } catch (Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
