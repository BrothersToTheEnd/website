<?php
    require 'security.php';
    $db=getMySqli();
    if(checkLogin($db, $_COOKIE["username"], $_COOKIE["password"])&&getPermission($db, $_COOKIE["username"], "del")){
        if($_COOKIE["confirmdel"]==1){
            $db->query("delete from s" . $_COOKIE["threadid"] . " where id=" . $_COOKIE["cpost"]);
            setcookie("confirmdel", 0);
            echo "Post deleted";
            echo "<meta http-equiv=\"refresh\" content=\"0; url=viewthread.php\">";
        }else{
            echo "Are you sure you want to delete this post: ";
            echo $db->query("select * from s". $_COOKIE["threadid"]." where id=" . $_COOKIE["cpost"])->fetch_array()["post"] . "</b><br>";
            echo "<button onClick=\"document.cookie='confirmdel=1'; window.location.href='delpost.php'\">yes</button> ";
            echo "<button onClick=\"window.location.href='viewthread.php'\">no</button>";
        }
    }else{
        echo "You do not have permission to delete posts.";
    }
?>
