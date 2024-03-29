<?php

namespace App\Controllers;

use App\Csrf;
use App\Flash;
use \Core\View;
use \App\Models\User;


/**
 * Class Password
 * @package App\Controllers
 */
class Password extends \Core\Controller
{

    /**
     * Show the forgotten password page
     *
     * @return void
     */
    public function forgotAction()
    {
        View::renderBlade('password/forgot2');
    }

    /**
     * Reset Success page
     */
    public function successAction()
    {
        View::renderBlade('password/reset-success2');
    }

    /**
     * Send the password reset link to the supplied email
     *
     * @return void
     */
    public function requestResetAction()
    {
        $csrf = new Csrf($_POST['token']);
        if(!$csrf->validate()){
            unset($_SESSION["csrf_token"]);
            die("CSRF token validation failed");
        }

        $secretKey  = "6LdBfJseAAAAAIkW9pOzuJ3dYTYBZJNiF17vOeTK";
        $statusMsg = '';

        if (isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])) {

            // Get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha-response']);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {

                $this->validateEmail($_POST);
                $user = User::findByEmail($_POST['email']);
                if(!$user){
                    Flash::addMessage('No such email exist in our database', Flash::DANGER);
                    $this->redirect('/password/forgot');
                }

                User::sendPasswordReset($_POST['email']);

                View::renderBlade('password/reset-requested2');

            }else {

                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg, 'danger');
                $this->redirect('/password/forgot');
            }
        }else {

            $statusMsg = 'Robot verification failed, please try again.';
            Flash::addMessage($statusMsg, 'danger');
            $this->redirect('/password/forgot');
        }

    }

    /**
     * Show the reset password form
     *
     * @return void
     */
    public function resetAction()
    {
        $token = $this->route_params['token'];

        $user = $this->getUserOrExit($token);

        View::renderBlade('password/reset2', [
            'token' => $token
        ]);
    }

    /**
     * Reset the user's password
     *
     * @return void
     */
    public function resetPasswordAction()
    {
        $token = $_POST['token'];

        $user = $this->getUserOrExit($token);

        $secretKey  = "6LdBfJseAAAAAIkW9pOzuJ3dYTYBZJNiF17vOeTK";
        $statusMsg = '';

        if (isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])) {

            // Get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha-response']);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {

                if ($user->resetPassword($_POST['password'])) {

                    //View::renderBlade('Password/reset-success');
                    $this->redirect('/password/success');

                } else {

                    foreach($user->errors as $error){
                        Flash::addMessage($error,'danger');
                    }
                    View::renderBlade('password/reset2', [
                        'token' => $token
                    ]);

                }

            }else {

                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg, 'danger');
                View::renderBlade('password/reset2', [
                    'token' => $token
                ]);
            }
        }else {

            $statusMsg = 'Robot verification failed, please try again.';
            Flash::addMessage($statusMsg, 'danger');
            View::renderBlade('password/reset2', [
                'token' => $token
            ]);
        }

    }

    /**
     * Find the user model associated with the password reset token,
     * or end the request with a message
     *
     * @param string $token Password reset token sent to user
     *
     * @return mixed User object if found and the token hasn't expired, null otherwise
     */
    protected function getUserOrExit($token)
    {
        $user = User::findByPasswordReset($token);

        if ($user) {

            return $user;

        } else {

            View::renderBlade('password/token-expired2');
            exit;

        }
    }

    /**
     * @param $arr
     */
    protected function validateEmail($arr){

        $email = filter_var($arr['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            Flash::addMessage('Invalid Email. Please enter a valid email', Flash::DANGER);
            View::renderBlade('password/forgot2');
        }

    }
}
