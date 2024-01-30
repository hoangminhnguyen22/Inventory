<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
   /**
    * @return Collection
    */
   protected $model;

    public function __construct(User $model)
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

    public function store($data = [])
    {
        $addUser = $this->model->create($data);
        $attach = $addUser->roles()->sync($data['role']);


        if($attach && $addUser){
            return $addUser;
        }
        if($addUser){
            $this->model->destroy($addUser->id);
            return false;
        }
    }

    public function update($id, $data = [])
    {
        $record = $this->model->findOrFail($id);
        $updateData = $record->update($data);
        $sync = $record->roles()->sync($data['role']);
        if($updateData && $sync){
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->roles()->detach();
        return $this->model->destroy($id);
    }

}
