<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Manufactorer;
use App\Repositories\ManufactorerRepositoryInterface;
use Illuminate\Support\Collection;

class ManufactorerRepository extends BaseRepository implements ManufactorerRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Manufactorer $model)
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
