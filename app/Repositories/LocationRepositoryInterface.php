<?php
namespace App\Repositories;

use App\Model\Location;
use Illuminate\Support\Collection;

interface LocationRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    
    public function find($id);
}
