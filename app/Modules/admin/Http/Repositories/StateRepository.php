<?php

namespace App\Modules\admin\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\State;

class StateRepository extends BaseRepository
{
    public function __construct(State $model)
    {
        parent::__construct($model);
    }

    public function fetchAll()
    {
        return $this->model
            ->newQuery()
            ->orderBy('ibge_state_id', 'desc')
            ->get();
    }

    public function pluck()
    {
        return $this->model
            ->newQuery()
            ->pluck('name', 'ibge_state_id');
    }
}
