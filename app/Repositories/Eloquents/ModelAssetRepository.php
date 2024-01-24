<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\ModelAsset;
use App\Repositories\ModelAssetRepositoryInterface;
use Illuminate\Support\Collection;

class ModelAssetRepository extends BaseRepository implements ModelAssetRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(ModelAsset $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->get();
    }

    public function paginate($items = null)
    {
        return $this->model->paginate($items);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
