<?php
    /**
     *
     * Created by PhpStorm.
     * User: herenoch
     * Date: 18/08/2016
     * Time: 11:21
     */

    $loginPOST=@$_POST["login"];
    $login_=array();
    $password_=array();

    $login_=explode(",",@$_COOKIE['login']);
    $password_=explode(",",@$_COOKIE['password']);
    $i=0;
    foreach ( $login_ as $login)
    {
        if($login==$loginPOST)
        {
            print($password_[$i]);
            break;
        }
        $i++;
    }

?>