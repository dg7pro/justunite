<?php


namespace App\Controllers;


use App\Auth;
use App\Models\Constituency;
use App\Models\District;
use App\Models\Notification;
use Core\Controller;


/**
 * Class Ajax
 * @package App\Controllers
 */
class Ajax extends Controller
{

    /**
     * Error message
     *
     * @var array
     */
    public $errors = [];

    /**
     * @param $server
     * @param $headers
     * @return array
     */
    protected function checkRequest($server, $headers): array
    {

        $err = [];

        if(!empty($server['HTTP_X_REQUESTED_WITH']) &&
            strtolower($server['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

            $err = array(
                'status' => 400,
                'message' => "Not a ajax request sorry!"
            );

        }

        /*if(!empty($_SERVER['HTTP_REFERER']) &&
            $_SERVER['HTTP_REFERER']!="https://www.jumatrimony.com/") {
            $err = array(
                'status' => 400,
                'message' => "Referrer is not our JUMatrimony"
            );
        }*/

        if (isset($headers['CsrfToken'])) {
            if ($headers['CsrfToken'] !== $_SESSION['csrf_token']) {

                $err = array(
                    'status' => 400,
                    'message' => "Wrong CSRF token"
                );
            }
        } else {
            $err = array(
                'status' => 400,
                'message' => "No CSRF token."
            );

        }
        return $err ;
    }

    /**
     * Just includes repeated
     * lines of code
     */
    protected function includeCheck(){

        header('Content-Type: application/json');
        $headers = apache_request_headers();

        $err = $this->checkRequest($_SERVER,$headers);
        if(!empty($err)){
            http_response_code(400);
            echo json_encode($err);
            exit();
        }
    }

    /**
     *  Fetch all unread notifications
     */
    public function unreadNotifications(){

        $user = Auth::getUser();
        if(isset($_POST['readrecord'])){

            $data = '';
            $notice = new Notification();
            $results = $notice->fetchAll($user);
            $num = count($results);

            if($num>0){
                foreach($results as $notify) {
                    $data .= '<div data-id="'.$notify->id.'" class="alert alert-info alert-dismissible fade show" role="alert">
                        '. $notify->message .'';
                    if($notify->type>=3){
                        if($notify->response==0){
                            $data .= '.     | Click to: <a href="javascript:void(0)" onclick="acceptInterest('.$notify->id.')"> <strong> Accept</strong></a>';
                        }else{
                            $data .= '.<strong> Your Response: Ok</strong> ';
                        }

                    }

                    $data .= '<button type="button" class="close" data-dismiss="alert" onclick="marNotification('.$notify->id.')" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';

                }
            }else{
                $data .= '<div class="alert alert-light" role="alert">
                              -- No new notification found --
                            </div>';
                //$data .= '<a class="btn btn-pink" href="/account/thrash" role="button">Trash Box</a>';
            }

            echo $data;
        }
    }

    /**
     * Mark notifications read
     */
    public function marNotification(){

        $msg ='';
        if(isset($_POST['aid'])){
            $notice = new Notification();
            $result = $notice->markAsRead($_POST['aid']);
            if($result){
                $msg = 'Marked as read, will be automatically deleted in 30days ';
            }else{
                $msg = 'Some thing went wrong';
            }
        }

        $data = ['msg'=>$msg];
        echo json_encode($data);
    }

    public function setUserLanguage(){

        $msg=$flag='';
        if(isset($_POST['lang'])){

            $cookie_name = "ju_user_lang";
            $cookie_value = $_POST['lang'];
            $result=setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day

            if($result){
                $msg = "Language set successfully";
                $flag = true;
            }

            $json_data = ['flag'=>$flag, 'msg'=>$msg];
            echo json_encode($json_data);
            exit();
        }
    }

    /**
     *  Select district for any state
     */
    public function selectDistrict(){

        if(isset($_POST['state_id'])){

            $sid = $_POST['state_id'];
            //echo $sid;

            $districts = District::fetchAll($sid);
            $num = count($districts);

            // Generate HTML of city options list
            if($num > 0){
                $opt = '<option value="">Select Districts ...</option>';
                foreach ($districts as $district){
                    $opt .= '<option value="'.$district['text'].'" >'.$district['text'].'</option>';
                }
                $flag = true;
            }else{
                $opt = '<option value="">District not available</option>';
                $flag = false;
            }
            $re = ['flag'=>$flag,'opt'=>$opt];
            echo json_encode($re);
        }
    }

    /**
     *  Select district for any state
     */
    public function selectConstituency(){

        if(isset($_POST['state_id'])){

            $sid = $_POST['state_id'];
            //echo $sid;

            $constituencies = Constituency::fetchAll($sid);
            $num = count($constituencies);

            // Generate HTML of city options list
            if($num > 0){
                $opt = '<option value="">Select Constituency ...</option>';
                foreach ($constituencies as $constituency){
                    $opt .= '<option value="'.$constituency['pc_name'].'" >'.$constituency['pc_name'].'</option>';
                }
                $flag = true;
            }else{
                $opt = '<option value="">Constituency not available</option>';
                $flag = false;
            }
            $re = ['flag'=>$flag,'opt'=>$opt];
            echo json_encode($re);
        }
    }

}