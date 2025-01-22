<?php

namespace App\Modules\admin\Http\Repositories;

use App\Http\Repositories\BaseRepository;
use App\Models\Admin;

class AdminRepository extends BaseRepository
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }
}
