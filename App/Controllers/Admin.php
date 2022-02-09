<?php


namespace App\Controllers;

use App\Auth;
use App\Flash;
use App\Models\Article;
use Core\View;

/**
 * Class Admin
 * @package App\Controllers
 */
class Admin extends Administered
{
    /**
     * Admin index page
     */
    public function indexAction(){

        View::renderBlade('admin.index');

    }

    /**
     * List all Users
     */
    public function membersAction(){

        View::renderBlade('admin.members');

    }

    /**
     * List all Users
     */
    public function templatesAction(){

        //$lang = $_GET['lang'];
        View::renderBlade('admin.templates');

    }

    /**
     * List all Users
     */
    public function blogsAction(){

        View::renderBlade('admin.blogs');

    }

    /**
     * Show text editor for content editing
     */
    public function articleAction(){

        $id = $_GET['id'];
        $article = Article::fetch($id);
        Auth::rememberBackPage();
        View::renderBlade('admin.article',['article'=>$article]);

    }

    /**
     *  Save edited content
     */
    public function saveArticleAction(){

        if(isset($_POST['update_article'])){

            $result = Article::update($_POST);
            if($result){
                Flash::addMessage('Content Updated Successfully', Flash::SUCCESS);
                $this->redirect(Auth::getBackToPage());
            }
        }else{

            Flash::addMessage('Could not update. Something went wrong', Flash::DANGER);
            $this->redirect(Auth::getBackToPage());
        }

    }















}