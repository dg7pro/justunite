<?php


namespace App\Controllers;

use App\Auth;
use App\Csrf;
use App\Flash;
use App\Models\Notification;
use App\Models\UserVariables;
use App\Sms;
use Core\View;
use Exception;


/**
 * Class Account
 * @package App\Controllers
 */
class Account extends Authenticated
{

    /**
     * Logout user
     * and redirect to home page
     */
    public function logoutAction()
    {

        Auth::logout();
        $this->redirect('/');
    }

    /**
     * Show self dashboard
     * to the user
     */
    public function dashboardAction()
    {
        // Fetch user and shorted profiles ids
        $user = Auth::getUser();

        $genders = ['Male','Female','Other'];


        // Render view
        View::renderBlade('account.dashboard',['authUser'=>$user,
            'religions'=>UserVariables::fetch('religions'),
            'languages'=>UserVariables::fetch('languages'),
            'states'=>UserVariables::fetch('states'),
            'genders'=>$genders
        ]);

    }

    public function addInfoAction(){

        $user = Auth::getUser();

        if(!empty($user->mobile)){
            $this->redirect('/account/my-profile');
        }

        $genders = ['Male','Female','Other'];
        $arr = isset($_GET['arr'])?json_decode($_GET['arr'],true):'';

        View::renderBlade('account.add_info',[
            'religions'=>UserVariables::fetch('religions'),
            'languages'=>UserVariables::fetch('languages'),
            'states'=>UserVariables::fetch('states'),
            'genders'=>$genders,
            'arr'=>$arr
        ]);

    }

    public function saveInfoAction(){

        $csrf = new Csrf($_POST['token']);
        if(!$csrf->validate()){
            unset($_SESSION["csrf_token"]);
            die("CSRF token validation failed");
        }

        $secretKey  = "6LdBfJseAAAAAIkW9pOzuJ3dYTYBZJNiF17vOeTK";
        $statusMsg = '';

        if (isset($_POST['save-info-submit'])) {

            if (isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])) {

                // Get verify response data
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha-response']);
                $responseData = json_decode($verifyResponse);
                if ($responseData->success) {

                    $user = Auth::getUser();
                    $result = $user->saveMemberInfo($_POST);

                    if($result){

                        $this->redirect('/account/confirm');

                    }else{

                        $arr = json_encode($_POST);
                        foreach ($user->errors as $error) {
                            Flash::addMessage($error, 'danger');
                        }
                        $this->redirect('/account/add-info?arr='.$arr);
                    }

                }else {

                    $statusMsg = 'Robot verification failed, please try again.';
                    Flash::addMessage($statusMsg, 'danger');
                    $this->redirect('/account/add-info');
                }
            }else {

                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg, 'danger');
                $this->redirect('/account/add-info');
            }

        }

    }

    public function updateInfoAction(){

        $csrf = new Csrf($_POST['_token']);
        if(!$csrf->validate()){
            unset($_SESSION["csrf_token"]);
            die("CSRF token validation failed");
        }

        $secretKey  = "6LdBfJseAAAAAIkW9pOzuJ3dYTYBZJNiF17vOeTK";
        $statusMsg = '';

        if (isset($_POST['update-info-submit'])) {

            if (isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])) {

                // Get verify response data
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha-response']);
                $responseData = json_decode($verifyResponse);
                if ($responseData->success) {
                    $user = Auth::getUser();
                    $result = $user->updateMemberInfo($_POST);

                    if($result){

                        //$this->redirect('/account/confirm');
                        Flash::addMessage('Account Info updated successfully', 'success');
                        $this->redirect('/account/dashboard');

                    }else{

                        $arr = json_encode($_POST);
                        foreach ($user->errors as $error) {
                            Flash::addMessage($error, 'danger');
                        }
                        $this->redirect('/account/dashboard');
                    }

                }else {

                    $statusMsg = 'Robot verification failed, please try again.';
                    Flash::addMessage($statusMsg, 'danger');
                    $this->redirect('/account/dashboard');
                }
            }else {

                $statusMsg = 'Robot verification failed, please try again.';
                Flash::addMessage($statusMsg, 'danger');
                $this->redirect('/account/dashboard');
            }

        }
    }

    public function confirmAction(){

        View::renderBlade('account.confirm');

    }

    public function verifiedAction(){

        View::renderBlade('account.verified');

    }



    /**
     * Edit User Profile
     */
    public function editProfileAction(){

        $user = Auth::getUser();
        View::renderBlade('account.edit-profile', [
            'maritals'=>UserVariables::fetch('maritals'),
            'religions'=>UserVariables::fetch('religions'),
            'languages'=>UserVariables::fetch('languages'),
            'heights'=>UserVariables::fetch('heights'),
            'educations'=>UserVariables::getEducations(),
            'degrees'=>UserVariables::fetch('degrees'),
            'sectors'=>UserVariables::fetch('sectors'),
            'occupations'=>UserVariables::getOccupations(),
            'universities'=>UserVariables::fetch('universities'),
            'incomes'=>UserVariables::fetch('incomes'),
            'fathers'=>UserVariables::fetch('fathers'),
            'mothers'=>UserVariables::fetch('mothers'),
            'famAffluence'=>UserVariables::fetch('fam_affluence'),
            'famValues'=>UserVariables::fetch('fam_values'),
            'famTypes'=>UserVariables::fetch('fam_types'),
            'famIncomes'=>UserVariables::fetch('fam_incomes'),
            'diets'=>UserVariables::fetch('diets'),
            'smokes'=>UserVariables::fetch('smokes'),
            'drinks'=>UserVariables::fetch('drinks'),
            'bodies'=>UserVariables::fetch('bodies'),
            'complexions'=>UserVariables::fetch('complexions'),
            'wts'=>UserVariables::getWts(),
            'challenges'=>UserVariables::fetch('challenged'),
            'bGroups'=>UserVariables::fetch('blood_groups'),
            'thalassemia'=>UserVariables::fetch('thalassemia'),
            'citizenship'=>UserVariables::fetch('citizenship'),
            'hobbies'=>UserVariables::fetch('hobbies'),
            'interests'=>UserVariables::fetch('interests'),
            'states'=>UserVariables::fetch('states'),
            'castes'=>UserVariables::getCastesInOrder($user->religion_id),
            'allCastes'=>UserVariables::getCastes($user->religion_id),
            'mangliks'=>UserVariables::fetch('mangliks'),
            'signs'=>UserVariables::fetch('signs'),
            'nakshatras'=>UserVariables::fetch('nakshatras'),
            'tongues'=>UserVariables::getTongues(),
            'countries'=>UserVariables::getCountries(),
            'userDistricts'=>UserVariables::fetch('districts'),

        ]);
    }

    /**
     * Show self-manage album-page
     * to the user
     */
    public function myAlbumAction(){

        $images = Image::getUserUploadedImages($_SESSION['user_id']);
        $num = count($images);
        View::renderBlade('account/my-album',['images'=>$images,'num'=>$num]);
    }

    /**
     * Show self photo management-page
     * to the user
     */
    public function managePhotoAction(){

        $images = Image::getUserUploadedImages($_SESSION['user_id']);
        View::renderBlade('account.manage-photo',['images'=>$images]);
    }

    /**
     * Show self create-profile
     * page to the new user
     */
    public function createProfileAction(){

        if (Auth::getUser()->is_active) {

            $this->redirect('/account/dashboard');
        }

        $arr = isset($_GET['arr'])?json_decode($_GET['arr'],true):'';
        $date_rows = UserVariables::dates();
        $months = UserVariables::months();
        $years = UserVariables::years();
        $religions = UserVariables::religions();
        $maritals = UserVariables::maritals();
        $heights = UserVariables::heights();
        $mangliks = UserVariables::mangliks();
        $languages = UserVariables::languages();
        $educations = UserVariables::getEducations();
        $occupations = UserVariables::getOccupations();
        $incomes = UserVariables::incomes();
        $communities = UserVariables::communities();
        $countries = UserVariables::getCountries();
        $districts = UserVariables::districts();
        //$castes = UserVariables::getCastes(1);
        $states = UserVariables::states();

        View::renderBlade('account/createProfile', [
            'arr'=>$arr,
            'dates' => $date_rows,
            'months' => $months,
            'years' => $years,
            'religions' => $religions,
            'maritals' => $maritals,
            'heights' => $heights,
            'mangliks' => $mangliks,
            'languages' => $languages,
            'educations' => $educations,
            'occupations' => $occupations,
            'incomes'=> $incomes,
            'communities'=>$communities,
            'countries'=>$countries,
            'districts'=>$districts,
            'states'=>$states

        ]);

    }

    /**
     * Save create-profile info
     * to database
     */
    public function saveProfileAction(){

        $csrf = new Csrf($_POST['token']);
        if(!$csrf->validate()){
            unset($_SESSION["csrf_token"]);
            die("CSRF token validation failed");
        }

        if (isset($_POST['create-profile-submit'])) {

            $user = Auth::getUser();
            $result = $user->saveUserProfile($_POST);

            if($result){
                Flash::addMessage('Profile created successfully', Flash::SUCCESS);

                // Notify user
                $notification = new Notification();
                $notification->informAboutSuccessfulProfileCreation($user);

                if(!$user->is_paid && $user->isNew()){
                    $this->redirect('/payment/insta-offer-page');
                }
                $this->redirect('/account/dashboard');
            }else{
                $arr = json_encode($_POST);

                foreach ($user->errors as $error) {
                    Flash::addMessage($error, 'danger');
                }
                $this->redirect('/account/create-profile?arr='.$arr);
            }
        }

    }

    public function savePersonAction(){

//        var_dump($_POST);
//        echo "<br><br>";
        /*foreach($_POST['contact'] as $c){

            echo $c['name'].' '.$c['mobile'];

        }*/
        $pairs = $_POST['contact'];
        $con= new Contact();
        if($con->save(Auth::getUser(),$pairs)){

            Flash::addMessage('Thanks! Contacts has been saved','success');
            foreach($con->errors as $error){
                Flash::addMessage($error,'danger');
            }
            $this->redirect('/account/dashboard');
        }else{
            foreach($con->errors as $error){
                Flash::addMessage($error,'danger');
            }
            $this->redirect('/account/dashboard');

        }
    }

    public function aadharVerificationAction(){

        View::renderBlade('account/aadhar-verification');
    }

    public function saveAadharAction(){

        var_dump($_POST['aadhar']);

        if(isset($_POST['aadhar']) && $_POST['aadhar']!=''){

            $user=Auth::getUser();

            if($user->saveAadhar($_POST)){

                Flash::addMessage('Aadhar saved successfully. Please upload front and back image of aadhar as shown below','success');
                $this->redirect('/account/upload-aadhar');
            }else{
                foreach ($user->errors as $error) {
                    Flash::addMessage($error, 'danger');
                }
                $this->redirect('/account/aadhar-verification');
            }

        }

    }

    public function uploadAadharAction(){

        $front = Aadhar::fetchUserAadharFront($_SESSION['user_id']);

        $back = Aadhar::fetchUserAadharBack($_SESSION['user_id']);

        if(count($front) && count($back)){
            $msg = "Pending verification by moderator. Will be checked and updated very soon";
        }else{
            $msg = "Please upload your aadhar front and back image both. Verified account get better response";
        }
        //Flash::addMessage('It just takes less than 2 minutes to upload your aadhar', 'danger');

        Flash::addMessage($msg, 'info');
        View::renderBlade('account/my-aadhar',['front'=>$front, 'back'=>$back]);

    }


    public function verifyAuthUserMobile(){

        $user = Auth::getUser();
        $mobile = $user->mobile;
        $mv = $user->mv;

        if($mobile!='' && !$mv){
            $user->createNewOtp();
            $sms = new Sms();
            $sms->sendOtp($mobile,$user->otp);
            View::renderBlade('register/verify_mobile', ['mobile'=>$mobile]);
        }else{
            throw new Exception('Page is no more available for you.', 404);
        }

    }

    public function notificationsAction(){

        View::renderBlade('account/notification');
    }

    public function settingsAction(){

        $user = Auth::getUser();

        View::renderBlade('account/settings',[
            'allCastes'=>UserVariables::getCastes($user->religion_id),
            'heights'=>UserVariables::fetch('heights'),
            'age_rows'=>UserVariables::getAgeRows(),
            'authUser'=>$user
        ]);
    }

}