<?php

namespace App\Modules\admin\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
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

    public function pluck()
    {
        return $this->model
            ->newQuery()
            ->pluck('name', 'id');
    }
}
