<?php

namespace App\Controllers;


use App\Models\Article as BlogAlias;
use App\Models\Image;
use App\Models\Template;
use App\Models\Users;
use Core\Controller;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $slm = !isset($_COOKIE['ju_user_lang']);

        $cookie_name ='ju_user_lang';
        $lang = $_COOKIE[$cookie_name] ?? 'english';

        $images = Image::fetchAll($lang);


//        $cookie_name ='ju_user_lang';
//        $lang = $_COOKIE[$cookie_name] ?? 'english';
//
//        $template = new Template();
//        $templates = $template->fetchAll($lang);
//
//
//        $_arr=[];
//        foreach($templates as $temp){
//            $_arr[$temp['name']] = $temp['content'];
//        }

//        var_dump($_arr);
//        exit();

        View::renderBlade('home/index',['slm'=>$slm,'images'=>$images]);

//        $w3 = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
//        //$actual_link = ( $w3. "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
//        $actual_link = $_SERVER['REQUEST_URI'];
//        var_dump($actual_link);
    }

    /**
     * Show the Blogs Page
     *
     * @return void
     */
    public function blogAction()
    {
        View::renderBlade('home/blog');
    }

    /**
     * President's Message page
     *
     * @return void
     */
    public function presidentMessageAction()
    {
        //$article_id = $_GET['id'];
        $blog = new BlogAlias();
        $blog = $blog->fetchSingle(5);

        View::renderBlade('home/message',['blog'=>$blog]);
        //View::renderBlade('home/message');
    }

    /**
     * Show donation page
     * @return void
     */
    public function donateAction(){

        View::renderBlade('home/donate');

    }

    /**
     * Show list of social Presence
     * @return void
     */
    public function socialMediaAction(){

        View::renderBlade('home/social_media');

    }

    public function langAction()
    {
        View::renderBlade('home/lang');
    }

    /*
     * Testing Functions
     * Just for reference and testing
     * tobe deleted
     * */

    public function session(){
        var_dump($_SESSION);
    }

    public function cookie(){
        $cookie_name = 'ju_user_lang';
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
    }

    public function whatsappAction(){

        $self1 = 918887610230;
        $self2 = 917565097233;
        $other = 919335333717;
        View::renderBlade('home/whatsapp',[
            'self1'=>$self1,
            'self2'=>$self2,
            'other'=>$other
        ]);
    }


}
