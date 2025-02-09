<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Services\PagBankService;
use App\Http\Controllers\Controller;
use App\Modules\site\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;;

class PagBankController extends Controller
{
  public function __construct(
    protected ProductRepository $productRepository
  ) {}

  public function redirectToCheckout(Request $request)
  {
    $customer = auth()->user();
    $quantity = $request->get('quantity');

    $product = $this->productRepository->find($request->get('product_id'));
    $product->quantity = $quantity;
    $product->total = $product->price * $quantity;

    $pagbank = app(PagBankService::class);

    $pagbank->setCustomer($customer);
    $pagbank->setProduct($product);
    $response = $pagbank->SendToCheckout();

    $paymentLink = '';
    $redirectLinks = $response['links'];
    foreach ($redirectLinks as $redirectLink) {
      if ($redirectLink['rel'] === 'PAY') {
        $paymentLink = $redirectLink['href'];
      }
    }

    if ($paymentLink) {
      return redirect($paymentLink);
    }

  }
}
