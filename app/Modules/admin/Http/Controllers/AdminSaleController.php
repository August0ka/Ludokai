<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\SaleRepository;
use App\Http\Controllers\Controller;

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
}
