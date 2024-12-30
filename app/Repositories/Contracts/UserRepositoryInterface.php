<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function getSpecificColumns(array $columns);
    public function findUserById($id);
    public function createUser(array $data);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}
