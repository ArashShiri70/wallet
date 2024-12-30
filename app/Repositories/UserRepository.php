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

    public function getAllUsers($relations = [])
    {
        return $this->model->with($relations)->all();
    }

    public function getUsersWithSpecificColumns(array $columns, $relations = [])
    {
        return $this->model->with($relations)->select($columns)->get();
    }

    public function findUserById($id, $relations = [])
    {
        return $this->model->with($relations)->findOrFail($id);
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
