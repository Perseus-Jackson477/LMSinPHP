<?php
namespace Controller;
class Check {
    public static function get(){
        session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION["admin"]){
        echo \View\Loader::make()->render("templates/Admin/admin.twig");
    }
        else{
            echo \View\Loader::make()->render("templates/User/homeuser.twig",array(
                "posts"=>\Model\User::Issued($_SESSION["user"])
        
            ));
    }
}
else{
    header("Location:/login");}
}
}