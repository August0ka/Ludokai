<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Services\PagBankService;
use App\Http\Controllers\Controller;
use App\Modules\site\Http\Repositories\{
  PagseguroTransactionRepository,
  ProductRepository,
    UserRepository
};
use Illuminate\Http\Request;;

class PagBankController extends Controller
{
  public function __construct(
    protected PagseguroTransactionRepository $pagseguroTransactionRepository,
    protected ProductRepository $productRepository,
    protected UserRepository $userRepository
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

    $this->createTransaction(($response));

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

  protected function createTransaction($transaction)
  {
    $paymentLink = collect($transaction['links'])->firstWhere('rel', 'PAY')['href'];
    $user = $this->userRepository->findByCpf($transaction['customer']['tax_id']);

    $transactionData = [
      'pagseguro_transaction_id' => $transaction['id'],
      'product_id' => $transaction['items'][0]['reference_id'],
      'user_id' => $user->id,
      'status' => $transaction['status'],
      'payment_link' => $paymentLink,
    ];

    $this->pagseguroTransactionRepository->create($transactionData);
  }

  public function checkoutWebhook(Request $request)
  {
    $data = $request->all();
    $product = $data['items'][0];
    $charges = $data['charges'][0];

    if ($charges['status'] == 'PAID') {
      $this->productRepository->updateQuantity($product['reference_id'], $product['quantity']);
    }
  }
}
