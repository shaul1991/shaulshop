<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @param int $id
     * @return int
     */
    public function getUserById(int $id)
    {
        return $id;
    }
}
