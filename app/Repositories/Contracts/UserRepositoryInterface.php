<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getAllUsers($relations = []);
    public function getUsersWithSpecificColumns(array $columns, $relations = []);
    public function findUserById($id, $relations = []);
    public function createUser(array $data);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}
