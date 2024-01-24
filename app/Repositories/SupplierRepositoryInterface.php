<?php
namespace App\Repositories;

use App\Model\Supplier;
use Illuminate\Support\Collection;

interface SupplierRepositoryInterface extends BaseRepositoryInterface
{
    public function all();

    public function paginate($items = null);
    
    public function find($id);
}
