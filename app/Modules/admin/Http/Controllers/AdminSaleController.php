<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\SaleRepository;
use App\Modules\admin\Http\Requests\AdminSaleRequest;
use App\Http\Controllers\Controller;
use App\Models\Sale;

class AdminSaleController extends Controller
{
    public function __construct(
        protected SaleRepository $saleRepository
    ) {}

    public function index()
    {
        $sales = $this->saleRepository->fetchAll();

        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        return view('admin.sales.form');
    }

    public function store(AdminSaleRequest $request)
    {
        $inputs = $request->validated();

        $this->saleRepository->create($inputs);

        return redirect()->route('admin.sales.index');
    }

    public function edit(Sale $sale)
    {
        return view('admin.sales.form', compact('sale'));
    }

    public function update(AdminSaleRequest $request, sale $sale)
    {
        $inputs = $request->validated();

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
