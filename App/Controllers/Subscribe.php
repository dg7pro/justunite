<?php

namespace App\Controllers;

use App\Flash;
use App\Models\Subscription;
use Core\Controller;
use Core\View;

class Subscribe extends Controller
{

    public function addAction(){

        $secretKey  = "6LdBfJseAAAAAIkW9pOzuJ3dYTYBZJNiF17vOeTK";

        $statusMsg = '';

        $nl = new Subscription($_POST);

        if(isset($_POST['submit'])) {
            if (isset($_POST['captcha-response2']) && !empty($_POST['captcha-response2'])) {

                // Get verify response data
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha-response2']);
                $responseData = json_decode($verifyResponse);
                if ($responseData->success) {
                    if ($nl->save()) {

                        // Send email
                        //$nl->sendActivationCode();

                        Flash::addMessage('Thanks for Subscribing to our Newsletter', 'success');
                        $this->redirect('/subscribe/success');
                    } else {

                        foreach ($nl->errors as $error) {
                            Flash::addMessage($error, 'danger');
                        }
                        $this->redirect('/subscribe/index');

                    }

                } else {

                    $statusMsg = 'Robot verification failed, please try again.';
                    Flash::addMessage($statusMsg, 'danger');
                    $this->redirect('/subscribe/index');
                }

            } else {
                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg, 'danger');
                $this->redirect('/subscribe/index');
            }
        }
    }

    public function successAction(){

        View::renderBlade('subscribe/success');
    }

    public function indexAction(){

        View::renderBlade('subscribe/index');
    }

    public function removeAction(){


    }

}