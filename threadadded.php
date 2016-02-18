<?php
    require "security.php";
    $db=getMySqli();
    if((checkLogin($db, $_COOKIE["username"], $_COOKIE["password"]))){
        //ok time to create a new thread
        $db->query("insert into subjects (name, creator) values (\"" . $_POST["title"]. "\", \"" . $_COOKIE["username"] . "\")");
        $result=$db->query("select * from subjects");
        $final=0;
        $max=$result->num_rows;
        for($i=0; $i<$max; $i=$i+1){
            $final=$result->fetch_assoc();
        }
        setcookie("threadid", $final["id"]);

        $db->query("create table s" . $final["id"] . " (id int key auto_increment, post varchar(1000), creator varchar(255));");
        echo "<meta http-equiv=\"refresh\" content=\"0; viewthread.php\">";
    }
 ?>
