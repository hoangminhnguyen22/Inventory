<?php
namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function all();

    public function paginate($items = null);
    
    public function find($id);

    public function update($id, $data = []);
    
    public function store($data = []);

    public function delete($id);

    
}
