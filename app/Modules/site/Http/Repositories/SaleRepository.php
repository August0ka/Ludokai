<?php

namespace App\Modules\site\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\Sale;

class SaleRepository extends BaseRepository
{
    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }

    public function fetchAll()
    {
        return $this->model
            ->newQuery()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getSalesByUser($userId)
    {
        return $this->model
            ->newQuery()
            ->where('user_id', $userId)
            ->get();
    }
}
