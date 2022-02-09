<?php

namespace App;

use App\Models\Template;

class Lang
{

    /**
     * Return messages and unset sessions
     * @return mixed
     */
    public static function getTemple(){

        $cookie_name ='ju_user_lang';
        $lang = $_COOKIE[$cookie_name] ?? 'english';

        $template = new Template();
        $templates = $template->fetchAll($lang);


        $_arr=[];
        foreach($templates as $temp){
            $_arr[$temp['name']] = $temp['content'];
        }

        return $_arr;
    }

}