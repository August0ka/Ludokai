<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function index(Request $request)
    {
        
        $search = $request->get('search') ? removeAccents($request->get('search')) : '';
        $category = $request->get('category') ? $request->get('category') : '';

        $products = $this->productRepository->fetchAll($search, $category);
        return view('site.home.index', compact('products'));
    }
}
