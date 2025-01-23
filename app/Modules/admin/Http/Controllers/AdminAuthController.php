<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function index()
    {
        return view('admin.login.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login');
    }
}
