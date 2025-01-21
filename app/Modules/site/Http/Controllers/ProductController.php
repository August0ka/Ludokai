<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
  public function __construct(
    protected ProductRepository $productRepository
  ) {}

  public function index(Product $product)
  {
    return view('site.product.index', compact('product'));
  }
}
