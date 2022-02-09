<?php

namespace App\Models;

use Core\Model;
use PDO;

class Image extends Model
{

    public static function fetchAll($lang){

        $sql = "SELECT * FROM images WHERE lang=?";
        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lang]);

        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}