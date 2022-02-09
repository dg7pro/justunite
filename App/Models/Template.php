<?php

namespace App\Models;

use Core\Model;
use PDO;

class Template extends \Core\Model
{

    public function fetchAll($lang){

        $sql = "SELECT * FROM templates WHERE lang=?";
        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lang]);

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $start
     * @param $limit
     * @return array
     */
    public static function liveSearchType($start, $limit, $type): array
    {

        $query = "SELECT * FROM templates ";

        if($type=='english'){
            $query .= 'WHERE lang ="english"';
        }elseif($type=='hindi'){
            $query .= 'WHERE lang ="hindi"';
        }else{
            $query .= 'WHERE templates.id > 0';
        }

        if($_POST['query'] != ''){
            $query .= '
            AND (name LIKE "%'.str_replace('', '%', $_POST['query']).'%"             
            OR lang LIKE "%'.str_replace('', '%', $_POST['query']).'%"
            )';
        }


        $query .= ' ORDER BY templates.id DESC ';

        $filter_query = $query . 'LIMIT '.$start.','.$limit.'';


        $pdo=Model::getDB();
        $stmt=$pdo->prepare($filter_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);


    }

    /**
     * @return int
     */
    public static function liveSearchTypeCount($type): int
    {

        $query = "SELECT * FROM templates ";

        if($type=='english'){
            $query .= 'WHERE lang ="english"';
        }elseif($type=='hindi'){
            $query .= 'WHERE lang ="hindi"';
        }else{
            $query .= 'WHERE templates.id > 0';
        }

        if($_POST['query'] != ''){
            $query .= '
            AND (name LIKE "%'.str_replace('', '%', $_POST['query']).'%" 
            OR lang LIKE "%'.str_replace('', '%', $_POST['query']).'%"
            )';
        }


        $pdo=Model::getDB();
        $stmt=$pdo->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();


    }

    public static function fetchTemplate($id){

        $sql = "SELECT id,name,lang,content FROM templates WHERE id=?";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateTemplate($arr): bool
    {

        $tid = $arr['id'];
        $name = $arr['name'];
        $lang = $arr['lang'];
        $content = $arr['content'];

        $sql = "UPDATE templates SET name=?,lang=?,content=? WHERE id=?";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        return $stmt->execute([$name,$lang,$content,$tid]);

    }

    public static function insertTemplate($arr): bool
    {

        $name = $arr['name'];
        $lang = $arr['lang'];
        $content = $arr['content'];

        $sql = "INSERT INTO templates(name,lang,content) VALUES (?,?,?)";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        return $stmt->execute([$name,$lang,$content]);

    }




}