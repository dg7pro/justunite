<?php

namespace App\Controllers;


use App\Models\Problem;
use Core\Controller;
use Core\View;

class Problems extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $problem = new Problem();
        $problems = $problem->fetchAll();
        //var_dump($problems);
        View::renderBlade('problems/index',['problems'=>$problems]);
    }

}