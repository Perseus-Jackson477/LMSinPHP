<?php

namespace Model;

Class Admin{
    public function req(){
        $db = \DB::get_instance();
        $query = "Select name,Issued_by from requested where status='requested'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }

    public function areq(){
        $db = \DB::get_instance();
        $query = "Select Name from user where admin=-1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }

    public function adminapprove($user){
        $db = \DB::get_instance();
        $query = "update user set admin=1 where Name='".$user."'";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }

    public function adminreject($user){    
        $db = \DB::get_instance();
        $query = "update user set admin=0 where Name='".$user."'";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }

    public function issued(){
        $db = \DB::get_instance();
        $query="Select name,Issued_by from issued";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }
}
