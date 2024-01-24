<?php
namespace App\Repositories;

use App\Model\ModelAsset;
use Illuminate\Support\Collection;

interface ModelAssetRepositoryInterface extends BaseRepositoryInterface
{
    public function all();

    public function paginate($items = null);
    
    public function find($id);
}
