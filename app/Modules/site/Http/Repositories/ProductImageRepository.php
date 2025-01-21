<?php

namespace App\Modules\site\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\ProductImage;

class ProductImageRepository extends BaseRepository
{
    public function __construct(ProductImage $model)
    {
        parent::__construct($model);
    }

    public function fetchImageByProduct($productId)
    {
        return $this->model
            ->newQuery()
            ->select('image')
            ->where('product_id', $productId)
            ->pluck('image');
    }
}
