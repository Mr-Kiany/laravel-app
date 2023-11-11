<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getAllUser()
    {
        return $this->model->get();
    }

    public function getAllWithPaginate(int $perPage = 15) 
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}