<?php

namespace Model;

Class Books{
    public function book(){
        $db = \DB::get_instance();
        $query = "Select * from books where quantity>0";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }

    public function quantitydec($name){
        $db = \DB::get_instance();
        $query="Update books set quantity=quantity-1 where Book='".$name."'";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }

    public function issue($name,$user){
        $db = \DB::get_instance();
        $query="Insert into requested values('".$name."','".$user."','requested')";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }

    public function check($name){
        $db = \DB::get_instance();
        $query="select exists(select * from books where Book='".$name."')";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetch();
        return $rows;
    }

    public function quantinc($book){
        $db = \DB::get_instance();
        $query="Update books set quantity=quantity+1 where Book='".$book."'";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }

    public function add($bookcode,$book){
        $db = \DB::get_instance();
            $query="Insert into books values(".$bookcode.",'".$book."',1)";
            $stmt = $db->prepare($query);
            $stmt->execute();
        }

    public function deletereq($book,$by){
        $db = \DB::get_instance();
        $query="Delete from requested where name='".$book."' and Issued_by='".$by."'";
        $stmt = $db->prepare($query);
        $stmt->execute();}

    public function insertissue($book,$by){
        $query="Insert into issued values('".$book."','".$by."')";
        $stmt = $db->prepare($query);
        $stmt->execute();
        }

    public function reject($book,$by){
        $query="Update requested set status='rejected' where name='".$book."' and Issued_by='".$by."'";
        echo $query;
        $stmt = $db->prepare($query);
        $stmt->execute();
        }
}