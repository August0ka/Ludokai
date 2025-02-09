<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Modules\site\Http\Repositories\SaleRepository;
use App\Modules\admin\Http\Requests\SiteSaleRequest;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
  public function __construct(
    protected ProductRepository $productRepository,
    protected SaleRepository $saleRepository,
  ) {}

  public function index()
  {
    //
  }

  public function store(SiteSaleRequest $request)
  {
    $user = auth()->user();

    $inputs = $request->validated();
    $inputs['user_id'] = $user->id;

    $product = $this->productRepository->fetchProductById($inputs['product_id']);

    if ($product->quantity < $inputs['quantity']) {
      return back()->with('error', 'Quantidade indisponível em estoque');
    }

    $inputs['value'] = $product->price;
    $inputs['total'] = $product->price * $inputs['quantity'];

    $newProductQuantity = $product->quantity - $inputs['quantity'];
    
    $this->productRepository->update(['quantity' => $newProductQuantity], $product->id);

    $this->saleRepository->create($inputs);

    return view('site.product.confirmPurchase');
  }

  public function mySales()
  {
    $user = auth()->user();

    $sales = $this->saleRepository->getSalesByUser($user->id);

    return view('site.user.my-orders', compact('sales'));
  }

  public function finishSale()
  {
    return view('site.product.confirmPurchase');
  }
}
