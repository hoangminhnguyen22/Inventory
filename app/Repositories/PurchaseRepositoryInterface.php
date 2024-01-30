<?php
namespace App\Repositories;

use App\Model\Purchase;
use Illuminate\Support\Collection;

interface PurchaseRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    
    public function find($id);
}
