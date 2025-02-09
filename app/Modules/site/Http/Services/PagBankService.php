<?php

namespace App\Modules\site\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PagBankService
{
  public function SendToCheckout()
  {
    $sandbox = env('PAGBANK_SANDBOX') ?  'sandbox.' : '';
    $token = env('PAGBANK_TOKEN');

    $redirectUrl = "https://{$sandbox}api.pagseguro.com/checkouts";
    $body = $this->mountBody();


    $data = Http::withHeaders([
      'Authorization' => "Bearer $token",
      'Content-type' => 'application/json',
      'accept' => '*/*',
    ])
      ->post($redirectUrl, $body);

    if ($data->successful()) {
      return $data->json();
    } else {
      dd('Erro:' . $data->body(), 'Status: ' . $data->status());
    }
  }

  private function mountBody()
  {
    $phoneNumber = mb_substr($this->customer->phone, 4);
    $phoneCountry = '+' . substr($this->customer->phone, 0, 2);
    $phoneArea = substr($this->customer->phone, 2, 2);
    $productPrice = $this->product->price * 100; // Transformar em centavos

    $body = [
      "customer" => [
        "phone" => [
          "country" => $phoneCountry,
          "area" => $phoneArea,
          "number" => $phoneNumber
        ],
        "name" => $this->customer->name,
        "email" => $this->customer->email,
        "tax_id" => $this->customer->cpf
      ],
      "customer_modifiable" => false,
      "items" => [
        [
          "reference_id" => (string)$this->product->id,
          "name" => $this->product->name,
          "description" => Str::length($this->product->description) > 246 ? Str::limit($this->product->description, 247) : $this->product->description,
          "quantity" => $this->product->quantity,
          "unit_amount" => $productPrice,
          "image_url" => asset('storage/' . $this->product->main_image)
        ]
      ],
      "payment_methods" => [
        ["type" => "BOLETO"],
        ["type" => "CREDIT_CARD"],
        ["type" => "DEBIT_CARD"],
        ["type" => "PIX"]
      ],
      "redirect_url" => route('site.finish.sale'),
      "soft_descriptor" => "teste"
    ];

    return $body;
  }

  public function setCustomer($customer)
  {
    $this->customer = $customer;
  }

  public function setProduct($product)
  {
    $this->product = $product;
  }
}
