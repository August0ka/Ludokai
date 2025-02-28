<?php

namespace App\Modules\site\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email)
    {
        return $this->model
            ->newQuery()
            ->where('email', $email)
            ->first();
    }

    public function fetchAll() 
    {
        return $this->model
            ->newQuery()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function pluck()
    {
        return $this->model
            ->newQuery()
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function findByCpf(string $cpf)
    {
        return $this->model
            ->newQuery()
            ->where('cpf', $cpf)
            ->first();
    }
}
