<?php
namespace App\Repositories;

use App\Model\Asset;
use Illuminate\Support\Collection;

interface AssetRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    
    public function find($id);
}
