<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected UserRepository $userRepository) {}
    public function login()
    {
        return view('site.login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = $this->userRepository->findByEmail($credentials['email']);

        if (!$user) {
            return back()->withErrors([
                'login_errors' => 'Esse usuário não existe'
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'login_errors' => 'Usuário ou senha incorreta',
        ]);
    }

    public function register()
    {
        return view('site.register.index');
    }
}
