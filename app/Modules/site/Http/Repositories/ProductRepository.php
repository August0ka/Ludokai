<?php

namespace App\Modules\site\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function fetchAll(
        $search = null,
        $category = null,
    ) {
        $product = $this->model
            ->newQuery()
            ->orderBy('id', 'desc');

        if ($search) {
            $product->whereRaw("unaccent(LOWER(name)) LIKE LOWER('%$search%')");
        }

        if ($category) {
            $product->where('category_id', $category);
        }

        return $product->get();
    }

    public function fetchProductById($id)
    {
        return $this->model->find($id);
    }
}
