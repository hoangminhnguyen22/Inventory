<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Department;
use App\Repositories\DepartmentRepositoryInterface;
use Illuminate\Support\Collection;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Department $model)
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
