<?php
namespace App\Repositories;

use App\Model\Manufactorer;
use Illuminate\Support\Collection;

interface ManufactorerRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    
    public function find($id);
}
