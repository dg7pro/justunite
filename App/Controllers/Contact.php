<?php

namespace App\Controllers;

use App\Flash;
use App\Models\Message;
use Core\Controller;
use Core\View;

class Contact extends Controller
{
    public function msgAction(){

        $secretKey  = "6LdBfJseAAAAAIkW9pOzuJ3dYTYBZJNiF17vOeTK";

        $statusMsg = '';

        $msg = new Message($_POST);

        if(isset($_POST['submit'])){
            if(isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])){

                // Get verify response data
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['captcha-response']);
                $responseData = json_decode($verifyResponse);
                if($responseData->success){


                    //Contact form submission code goes here ...
                    if($msg->save()){
                        $statusMsg = 'Thanks for contacting us, your message submitted successfully';
                        Flash::addMessage($statusMsg,'success');
                        $this->redirect('/contact/success');
                    }else{

                        foreach($msg->errors as $error){
                            Flash::addMessage($error,'danger');
                        }
                        $this->redirect('/contact/error');

                    }

                }else{

                    $statusMsg = 'Robot verification failed, please try again.';
                    Flash::addMessage($statusMsg,'danger');
                    $this->redirect('/contact/error');
                }
            }else{
                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg,'danger');
                $this->redirect('/contact/error');
            }

        }

    }

    public function successAction(){

        View::renderBlade('contact/success');
    }

    public function errorAction(){

        View::renderBlade('contact/error');
    }

}