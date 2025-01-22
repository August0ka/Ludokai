<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\SaleRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
  public function __construct(
    protected SaleRepository $saleRepository,
  ) {}

  public function index()
  {
    //
  }

  public function store(Request $request)
  {
    $user = auth()->user();

    $inputs = [
      'product_id' => $request->get('product_id'),
      'quantity' => $request->get('quantity'),
      'total' => $request->get('total'),
      'user_id' => $user->id,
    ];

    $this->saleRepository->create($inputs);

    return view('site.product.confirmPurchase');
  }

  public function mySales()
  {
    $user = auth()->user();

    $sales = $this->saleRepository->getSalesByUser($user->id);

    return view('site.user.my-orders', compact('sales'));
  }
}
