<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
  public function __construct(protected Model $model) {}
  public function all()
  {
    return $this->model->all();
  }

  public function create(array $data)
  {
    return $this->model->create($data);
  }

  public function update(array $data, $id)
  {
    $user = $this->model->findOrFail($id);
    $user->update($data);
    return $user;
  }

  public function delete($id)
  {
    $user = $this->model->findOrFail($id);
    $user->delete();
  }

  public function find($id)
  {
    return $this->model->findOrFail($id);
  }
}
