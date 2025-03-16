<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\UserRepository;
use App\Modules\site\Http\Requests\SiteUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Throwable;

class AdminUserController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function index()
    {
        $users = $this->userRepository->fetchAll();

        foreach ($users as $user) {
            $user->cpf = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/','$1.$2.$3-$4', $user->cpf);
        }

        $states = $this->getStates();

        foreach ($users as $user) {
            $user->city = $this->getCityName($user->city);
        }

        return view('admin.users.index', compact('users', 'states'));
    }

    public function create()
    {
        $states = $this->getStates();

        return view('admin.users.form', compact('states'));
    }

    public function store(SiteUserRequest $request)
    {
        $inputs = $request->validated();

        $this->userRepository->create($inputs);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $states = $this->getStates();

        return view('admin.users.form', compact('user', 'states'));
    }

    public function update(SiteUserRequest $request, User $user)
    {
        $inputs = $request->validated();

        if (isset($inputs['password'])) {
            $inputs['password'] = Hash::make($inputs['password']);
        } else {
            unset($inputs['password']);
        }

        $this->userRepository->update($inputs, $user->id);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        try {
            $this->userRepository->delete($user->id);

            return response()->json(['success' => true, 'message' => 'Usuário deletado com sucesso']);
        } catch (Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function getStates()
    {
        $statesArray = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')->json();

        $states = [];
        foreach ($statesArray as $state) {
            $states[$state['id']] = $state['nome'];
        }

        return $states;
    }

    public function getCityName($cityId)
    {
        $cityResponse = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/municipios/$cityId")->json();

        return isset($cityResponse['nome']) ? $cityResponse['nome'] : '';        
    }
}
