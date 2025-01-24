<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductRepository;
use App\Modules\admin\Http\Repositories\AdminRepository;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected AdminRepository $adminRepository
    ) {}

    public function index()
    {
        return view('admin.login.index');
    }

    public function authenticate()
    {
        $credentials = request()->only('email', 'password');
        $admin = $this->adminRepository->findByEmail($credentials['email']);

        if (!$admin) {
            return back()->withErrors([
                'login_errors' => 'Esse usuário não existe'
            ]);
        }

        if (auth('admin')->attempt($credentials)) {
            request()->session()->regenerate();
            
            return redirect()->route('admin.products.index');
        }
    }

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login');
    }
}
