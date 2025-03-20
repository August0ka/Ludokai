<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\SaleRepository;
use App\Modules\admin\Http\Requests\AdminSaleRequest;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Modules\site\Http\Repositories\ProductRepository;
use App\Modules\site\Http\Repositories\UserRepository;
use Throwable;

class AdminSaleController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected SaleRepository $saleRepository,
        protected UserRepository $userRepository
    ) {}

    public function index()
    {
        $sales = $this->saleRepository->fetchAll();

        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $users = $this->userRepository->pluck();
        $products = $this->productRepository->select();

        return view('admin.sales.form', compact('users', 'products'));
    }

    public function store(AdminSaleRequest $request)
    {
        $inputs = $request->validated();
        $this->productRepository->updateQuantity($inputs['product_id'], $inputs['quantity']);

        $this->saleRepository->create($inputs);

        return redirect()->route('admin.sales.index');
    }

    public function edit(Sale $sale)
    {
        $users = $this->userRepository->pluck();
        $products = $this->productRepository->select();

        return view('admin.sales.form', compact('sale', 'users', 'products'));
    }

    public function update(AdminSaleRequest $request, sale $sale)
    {
        $inputs = $request->validated();
        $this->productRepository->updateQuantity($inputs['product_id'], $inputs['quantity']);


        $this->saleRepository->update($inputs, $sale->id);

        return redirect()->route('admin.sales.index');
    }

    public function destroy(Sale $sale)
    {
        try {
            $this->saleRepository->delete($sale->id);

            return response()->json(['success' => true, 'message' => 'Venda deletada com sucesso']);
        } catch (Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
