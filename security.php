<?php
if(!defined('SECURITY')){
    define('SECURITY', 1);
    function checkLogin($db, $username, $password){
        $result=$db->query("select * from users");
        while($result->num_rows>0){
            $line=$result->fetch_assoc();
            if($line["name"]==$username){
                    if($line["password"]==$password){
                        return true;
                    }else{
                        return false;
                    }
            }
        }
    }

    function getMySqli(){
        return new mysqli("btte.gaming.bz", "bttegami_phpUser", "tHrEe.1415", "bttegami_btte_website");
    }

    function getPermission($db, $username, $permissionName){
            $result=$db->query("select * from permissions");
            while($result->num_rows>0){
                $line=$result->fetch_assoc();
                if($line["name"]==$username){
                    return $line[$permissionName];
                }
            }
    }
}
?>
