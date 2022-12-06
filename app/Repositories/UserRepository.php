<?php

namespace App\Repositories;
use App\Models\Users;

class UserRepository extends BaseRepository {

    protected $model;

    public function __construct(Users $model) {
        $this->model = $model;
    }

    public function getAllUsers() {
        return $this->model->orderBy('name')->get();
    }

    public function showUserById($id) {
        return $this->model->find($id);
    }
}