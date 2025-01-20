<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function index()
    {
        $products = $this->productRepository->fetchAll();
        return view('site.home.index', compact('products'));
    }
}
