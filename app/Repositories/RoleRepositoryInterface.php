<?php
namespace App\Repositories;

use App\Model\Role;
use Illuminate\Support\Collection;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function all();

    public function paginate($items = null);
    
    public function find($id);

    public function store($data = []);
}
