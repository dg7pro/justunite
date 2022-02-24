<?php

namespace App\Models;

use PDO;

class Message extends \Core\Model
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

            $sql = 'INSERT INTO messages (name, email, subject, message) VALUES (:nam, :email, :subject, :message)';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':nam', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':subject', $this->subject, PDO::PARAM_STR);
            $stmt->bindValue(':message', $this->message, PDO::PARAM_STR);
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

    }


}