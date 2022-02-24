<?php

namespace App\Models;

use Core\Model;
use PDO;

class Subscription extends Model
{

    /**
     * Error message
     *
     * @var array
     */
    public $errors = [];

    /**
     * User constructor.
     * @param array $data
     */
    public function __construct(array $data=[])
    {
        foreach ($data as $key => $value){
            $this->$key=$value;
        }
    }

    /**
     * Save user information into database
     *
     * @return bool|false
     */
    public function save(): bool
    {

        $this->validate();

        if(empty($this->errors)){

            $sql = 'INSERT INTO subscriptions (email) VALUES (:email)';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            return $stmt->execute();

        }

        return false;
    }

    /**
     * Validate User Input
     */
    public function validate(){

        // email address
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid email';
        }
        if($this->emailExists($this->email)){
            $this->errors[] = 'Email already exists';
        }

    }

    /**
     * @param $email
     * @param null $ignore_id
     * @return bool
     */
    public function emailExists($email, $ignore_id=null): bool
    {

        $user = static::findByEmail($email);

        if($user){
            if($user->id !=$ignore_id){
                return true;
            }
        }
        return false;

    }

    /**
     * @param $email
     * @return mixed
     */
    public static function findByEmail($email){

        $sql = "SELECT * FROM subscriptions WHERE email= :email";
        $db = static::getDB();

        $stmt=$db->prepare($sql);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();

        return $stmt->fetch();
    }

}