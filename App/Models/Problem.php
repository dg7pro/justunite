<?php

namespace App\Models;

use Core\Model;
use PDO;

class Problem extends Model
{

    public function fetchAll(){

        $sql = "SELECT id, title FROM problems";
        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}