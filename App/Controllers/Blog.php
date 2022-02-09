<?php

namespace App\Controllers;

use App\Models\Article as BlogAlias;
use Core\Controller;
use Core\View;

class Blog extends Controller
{
    public function indexAction()
    {

        $slm = !isset($_COOKIE['ju_user_lang']);
        $lang = $_COOKIE['ju_user_lang'] ?? 'english';

        $blogs = BlogAlias::fetchAll($lang);

        View::renderBlade('blog/index',['blogs'=>$blogs,'slm'=>$slm]);

//        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        $w3 = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
//        $actual_link = ( $w3. "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
//        var_dump($actual_link);

    }

    public function articleAction()
    {

        $article_id = $_GET['id'];
        $blog = new BlogAlias();
        $blog = $blog->fetchSingle($article_id);

        View::renderBlade('blog/single',['blog'=>$blog]);



    }


}