<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Purchase;
use App\Repositories\PurchaseRepositoryInterface;
use Illuminate\Support\Collection;

class PurchaseRepository extends BaseRepository implements PurchaseRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Purchase $model)
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
