<?php
namespace App\Repositories;

use App\Model\Asset;
use Illuminate\Support\Collection;

interface AssetRepositoryInterface extends BaseRepositoryInterface
{
    public function all();

    public function paginate($items = null);
    
    public function find($id);
}
