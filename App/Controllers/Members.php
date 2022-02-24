<?php

namespace App\Controllers;

use App\Models\Users;
use Core\Controller;
use Core\View;

class Members extends Controller
{

    public function indexAction(){

        $us = new Users();
        $users = $us->fetchAll();
        //var_dump($users);
        View::renderBlade('members/index',['users'=>$users]);
    }

}