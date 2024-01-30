<?php
namespace App\Repositories;

use App\Model\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    
    public function find($id);
}
