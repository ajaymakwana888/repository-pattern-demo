<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $usersRepositories;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $usersRepo
     */
    public function __construct(UserRepositoryInterface $usersRepo)
    {
        $this->usersRepositories = $usersRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = $this->usersRepositories->all();

        return view('users.users', compact('users'));
    }
}
