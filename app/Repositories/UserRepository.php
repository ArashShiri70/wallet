<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAllUsers()
    {
        return $this->model->all();
    }

    public function getSpecificColumns(array $columns)
    {
        return $this->model->select($columns)->get();
    }

    public function findUserById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createUser(array $data)
    {
        return $this->model->create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->findUserById($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = $this->findUserById($id);
        return $user->delete();
    }
}
