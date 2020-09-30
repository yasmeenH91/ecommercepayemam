<?php


namespace App\Repositories;


use App\Http\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    protected $model;

    //construct to bind model to repo
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
       $record = $this->find($id);
        return $record->update($data);
    }

    public function show($id)
    {
        $record = $this->model->findOrFail($id);
        return $record;
    }

    public function delete($id)
    {
        return $record = $this->model->destroy($id);
    }

    public function getModel($model)
    {
        return $this->model;
    }

    public function setModel($model)
    {
         $this->model = $model;
         return $this;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
