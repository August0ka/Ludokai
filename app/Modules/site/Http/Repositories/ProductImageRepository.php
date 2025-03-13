<?php

namespace App\Modules\site\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
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

    public function deleteImageByProduct($productId)
    {
        return $this->model
            ->newQuery()
            ->where('product_id', $productId)
            ->delete();
    }

    public function deleteSecondaryImageByProduct($productId, $secondaryImageId)
    {
        $secondaryImage = $this->model
            ->newQuery()
            ->where('id', $secondaryImageId)
            ->where('product_id', $productId)
            ->first();

        Storage::disk('public')->delete($secondaryImage->image);

        return $secondaryImage->delete();
    }
}
