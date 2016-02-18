<?php
    require "security.php";
    $db=getMySqli();
    if(checkLogin($db, $_COOKIE["username"], $_COOKIE["password"])&&getPermission($db, $_COOKIE["username"], "del")){
        if($_COOKIE["confirmdel"]==1){
            $db->query("delete from subjects where id=" . $_COOKIE["threadid"]);
            $db->query("drop table s" . $_COOKIE["threadid"]);
            echo "topic deleted";
            echo "<meta http-equiv=\"refresh\" content=\"0; url=main.php\"/>";
            setcookie("confirmdel", 0);
        }else{
            echo "Are you sure you want to delete this topic?<br><b>";
            echo $db->query("select * from subjects where id=" . $_COOKIE["threadid"])->fetch_array()["name"] . "</b><br>";
            echo "<button onClick=\"document.cookie='confirmdel=1'; window.location.href='deletetopic.php'\">yes</button> ";
            echo "<button onClick=\"window.location.href='main.php'\">no</button>";
        }
    }else{
        echo "You don't have permission to delete topics";
    }
?>
