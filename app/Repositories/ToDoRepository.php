<?php

namespace App\Repositories;
use App\Models\ToDoList;

class ToDoRepository extends BaseRepository {

    protected $model;

    public function __construct(ToDoList $model) {
        $this->model = $model;
    }

    public function getAllToDos() {
        return $this->model->where('id', '>=' , 0);
    }

    public function showToDoById($id) {
        return $this->model->find($id);
    }
}