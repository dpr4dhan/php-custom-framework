<?php
declare(strict_types = 1);

namespace App\Controllers;

use App\App;
use App\Models\UserModel;
use App\View;

class Home
{
    public function index() :View
    {
//        $user = new UserModel();
//        $userId = $user->create('Dhiraj', 'dpr4dhan@gmail.com');
//        return $userId;
        return View::make('home/index', 'layouts/app-layout');
    }
}