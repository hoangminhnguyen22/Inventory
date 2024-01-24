<?php

namespace App\Repositories\Eloquents;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepositoryInterface; 

class BaseRepository implements BaseRepositoryInterface 
{
    /**
     * @var Model
     */
     protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index($item)
    {
        return $this->model->paginate($item);
    }

    public function store($data = [])
    {
        return $this->model->create($data);
    }

    public function update($id, $data = [])
    {
        $record = $this->model->findOrFail($id);

        return $record->update($data);
    }

    public function save($id, $data = [])
    {
        foreach($data as $key => $value){
            $this->model->$key = $value;
        }
        return $this->model->save();
    }


    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getRecent($item)
    {
        return $this->model->orderBy('id','DESc')->take($item)->get();
    }

}
