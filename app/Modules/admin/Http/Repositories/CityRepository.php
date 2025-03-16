<?php

namespace App\Modules\admin\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\City;

class CityRepository extends BaseRepository
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function fetchAll()
    {
        return $this->model
            ->newQuery()
            ->orderBy('ibge_city_id', 'desc')
            ->get();
    }

    public function pluck()
    {
        return $this->model
            ->newQuery()
            ->pluck('name', 'ibge_city_id');
    }

    public function firstById($ibgeCityId)
    {
        return $this->model
            ->newQuery()
            ->where('ibge_city_id', $ibgeCityId)
            ->first();
    }

    public function getByIbgeStateId($ibgeStateId)
    {
        return $this->model
            ->newQuery()
            ->where('state_id', $ibgeStateId)
            ->get();
    }
}
