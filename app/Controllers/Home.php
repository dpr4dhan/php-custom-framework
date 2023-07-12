<?php

namespace App\Controllers;

use App\App;
use App\Models\UserModel;

class Home
{
    public function index()
    {
        $user = new UserModel();
        $userId = $user->create('Dhiraj', 'dpr4dhan@gmail.com');
        return $userId;
    }
}