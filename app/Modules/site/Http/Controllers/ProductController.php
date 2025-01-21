<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductImageRepository;
use App\Modules\site\Http\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
  public function __construct(
    protected ProductImageRepository $productImageRepository,
    protected ProductRepository $productRepository
  ) {}

  public function index(Product $product)
  {
    $productImages = $this->productImageRepository->fetchImageByProduct(productId: $product->id)->toArray();
    array_unshift($productImages, $product->main_image);

    return view('site.product.index', compact('product', 'productImages'));
  }
}
