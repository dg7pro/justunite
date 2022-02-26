<?php


namespace App\Controllers;

use App\Auth;
use App\Csrf;
use App\Flash;
use App\Models\Setting;
use App\Models\User;
use Core\Controller;
use Core\View;

/**
 * Class Login
 * @package App\Controllers
 */
class Login extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {

        $this->requireGuest();

        //Flash::addMessage('Enter your account credentials to login...', Flash::WARNING);
        //Flash::addMessage('Please login to continue...', Flash::WARNING);

        View::renderBlade('login/form');

    }

    /**
     *  Authenticate User
     */
    public function authenticateAction()
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

                $this->checkEmail($_POST);
                $user = User::authenticate($_POST['uid'],$_POST['password']);
                $remember_me = isset($_POST['remember_me']);   // true or false

                if($user){

                    Auth::login($user,$remember_me);

                    $this->redirect(Auth::getReturnToPage());

                }
                else{

                    Flash::addMessage('Invalid Credentials. Enter correct email & password', Flash::DANGER);
                    View::renderBlade('login/index',['uid'=>$_POST['uid'],'remember_me'=>$remember_me]);
                }
            }else {

                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg, 'danger');
                $this->redirect('login/index');
            }

        }else {

            $statusMsg = 'Robot verification failed, please try again.';
            Flash::addMessage($statusMsg, 'danger');
            $this->redirect('login/index');
        }

    }

    /**
     * Sanitize and validate email
     * @param $arr
     */
    protected function checkEmail($arr){

        $email = filter_var($arr['uid'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            Flash::addMessage('Invalid Email. Please enter a valid email', Flash::DANGER);
            View::renderBlade('login/index');
        }

    }

    /**
     * Ask inactive user to resend activation link
     */
    public function activateAccountAction(){

        $email = $_GET['email'] ?? '';
        View::renderBlade('login/resend_activation_link',['email'=>$email]);
    }

    /**
     * Shows pending verification page if
     * both email and mobile is not verified
     */
    public function pendingVerificationAction(){

        $un_active_user = User::findByID($_SESSION['un_active_user_id']);

        View::renderBlade('login/pending_verification',['user'=>$un_active_user]);
    }

    protected function isOfferOngoing(){
        $setting = new Setting();
        return $setting->is_ongoing_current_offer();
    }

    protected function isInstaOfferOngoing(){
        $setting = new Setting();
        return $setting->is_ongoing_insta_offer();
    }

}