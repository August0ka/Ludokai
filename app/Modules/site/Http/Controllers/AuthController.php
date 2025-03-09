<?php

namespace App\Modules\site\Http\Controllers;

use App\Modules\site\Http\Repositories\UserRepository;
use App\Modules\site\Http\Requests\SiteUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

        if (!$credentials['email']) {
            return back()->withErrors([
                'login_errors' => 'O campo e-mail é obrigatório'
            ]);
        }

        if (!$credentials['password']) {
            return back()->withErrors([
                'login_errors' => 'O campo senha é obrigatório'
            ]);
        }

        $user = $this->userRepository->findByEmail($credentials['email']);

        if (!$user) {
            return back()->withErrors([
                'login_errors' => 'Esse usuário não existe'
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('site.home');
        }

        return back()->withErrors([
            'login_errors' => 'Usuário ou senha incorreta',
        ]);
    }

    public function register()
    {
        $statesArray = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')->json();

        $states = [];
        foreach ($statesArray as $state) {
            $states[$state['id']] = $state['nome'];
        }

        return view('site.register.index', compact('states'));
    }

    public function store(SiteUserRequest $request)
    {
        $inputs = $request->validated();

        $this->userRepository->create($inputs);

        return redirect()->route('site.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.login');
    }
}
