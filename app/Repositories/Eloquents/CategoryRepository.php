<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(Category $model)
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
