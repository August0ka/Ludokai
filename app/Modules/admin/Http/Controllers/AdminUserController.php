<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class AdminUserController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function index()
    {
        $users = $this->userRepository->fetchAll();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token');

        $this->userRepository->create($inputs);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $inputs = $request->except('_token', '_method');

        $this->userRepository->update($user->id, $inputs);

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
}
