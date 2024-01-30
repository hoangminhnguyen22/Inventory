<?php
namespace App\Repositories;

use App\Model\Department;
use Illuminate\Support\Collection;

interface DepartmentRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    
    public function find($id);
}
