<?php

namespace App\repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return User::all();
    }
}
