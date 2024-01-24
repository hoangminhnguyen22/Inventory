<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Location;
use App\Repositories\LocationRepositoryInterface;
use Illuminate\Support\Collection;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Location $model)
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
