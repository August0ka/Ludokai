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
}
