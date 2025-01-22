<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function index()
    {
        $products = $this->productRepository->fetchAll();

        return view('admin.products.index', compact('products'));
    }
}
