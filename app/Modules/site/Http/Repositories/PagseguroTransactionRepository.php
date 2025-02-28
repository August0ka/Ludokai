<?php

namespace App\Modules\site\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\PagseguroTransaction;

class PagseguroTransactionRepository extends BaseRepository
{
    public function __construct(PagseguroTransaction $model)
    {
        parent::__construct($model);
    }

    public function fetchAll($productId)
    {
        return $this->model
            ->newQuery()
            ->select('image')
            ->where('product_id', $productId)
            ->pluck('image');
    }
}
