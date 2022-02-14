<?php

namespace App\Models;

use Core\Model;
use PDO;

class Article extends Model
{

    public static function fetchAll($lan){

        $sql = "SELECT articles.*, users.full_name as writer FROM articles LEFT JOIN users ON articles.user_id=users.id
                    WHERE lang=?";
        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lan]);

        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchSingle($aid){

        //$sql = "SELECT * FROM articles WHERE id=?";
        /*$sql = "SELECT articles.*, users.full_name as writer, users.*
                   FROM articles LEFT JOIN users ON articles.user_id=users.id WHERE articles.id=?";*/
        $sql = "SELECT articles.*, users.full_name as writer, users.*, abouts.content as about
                    FROM articles LEFT JOIN users ON articles.user_id=users.id 
                    LEFT JOIN abouts  ON users.id=abouts.user_id WHERE articles.id=?";
        $pdo=Model::getDB();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$aid]);

        return  $stmt->fetch(PDO::FETCH_OBJ);

    }

    public static function fetchTitle($id){

        $sql = "SELECT id,title FROM articles WHERE id=?";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateTitle($arr){

        $id = $arr['id'];
        $title = $arr['title'];

        $sql = "UPDATE articles SET title=? WHERE id=?";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        return $stmt->execute([$title,$id]);

    }

    public static function fetch($id){

        $sql = "SELECT * FROM articles WHERE id=?";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($arr){

        $aid = $arr['article_id'];
        $content = $arr['content'];

        $sql = "UPDATE articles SET content=? WHERE id=?";
        $pdo=Model::getDB();
        $stmt=$pdo->prepare($sql);
        return $stmt->execute([$content,$aid]);

    }


}