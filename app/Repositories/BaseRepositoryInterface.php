<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/

interface BaseRepositoryInterface
{
    /**
    * @param array $attributes
    * @return Model
    */
    public function index($item);

    public function store($data = []);

    public function update($id, $data = []);

    public function save($id, $data = []);

    public function delete($id);

    public function show($id);

    public function getRecent($item);
}
