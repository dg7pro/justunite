<?php

namespace App\Models;

use Core\Model;
use PDO;

class Constituency extends Model
{

    /**
     * @param $sid
     * @return array
     */
    public static function fetchAll($sid): array
    {

        $sql = "SELECT * FROM constituencies WHERE state_id =?";

        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$sid]);

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}