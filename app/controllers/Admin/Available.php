<?php
    namespace Admin;
    session_start();
    Class Available{
        public function get(){
            if($_SESSION["admin"]){
            echo \View\Loader::make()->render("templates/Admin/avail.twig", array(
                "posts"=> \Model\Admin::avail(),
            ));}
            else{
                session_destroy();
                echo \View\Loader::make()->render("templates/Login/login.twig");
            }}}