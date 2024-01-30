<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Supplier;
use App\Repositories\SupplierRepositoryInterface;
use Illuminate\Support\Collection;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Supplier $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
