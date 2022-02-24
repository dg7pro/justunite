<?php

namespace App\Models;

use Core\Model;
use PDO;

class Users extends Model
{

    public function fetchAll(){

        $sql = "SELECT * FROM users";
        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}