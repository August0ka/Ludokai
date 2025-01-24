<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\UserRepository;
use App\Http\Controllers\Controller;

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
}
