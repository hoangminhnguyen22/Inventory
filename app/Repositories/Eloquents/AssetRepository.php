<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Asset;
use App\Repositories\AssetRepositoryInterface;
use Illuminate\Support\Collection;

class AssetRepository extends BaseRepository implements AssetRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Asset $model)
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
