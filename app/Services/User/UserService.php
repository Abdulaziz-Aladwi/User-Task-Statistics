<?php
namespace App\Services\User;

use App\Models\User;

class UserService
{

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;        
    }

    public function getUsers(array $criteria)
    {
        $users = $this->userModel::select('id', 'name');

        if ($type = $criteria['type']) {
            $users->ofType($type);
        }

        return $users;
    }
}