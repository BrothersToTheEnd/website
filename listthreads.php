<?php
    require "security.php";
    $db=getMySqli();
    if(checkLogin($db, $_COOKIE["username"], $_COOKIE["password"])){
        $result=$db->query("select * from subjects");
        $end=$result->num_rows;
        $topics[0]=0;
        if($result->num_rows==0){
            echo "There are no topics.";
            goto end;
        }
        for($i=0; $i!=$end; $i++){
            $topics[$i]=$result->fetch_assoc();
        }
        for($i=count($topics)-1; $i>=0; $i--){
            echo "<a onClick=\"document.cookie='threadid=" . $topics[$i]["id"] . "'; window.location.href='viewthread.php'\">";
            echo "<div class=\"topic\">";
            echo "<div class=\"innerpost\">";
            echo "<b>" . $topics[$i]["name"] . "</b>";
            echo "</div>";
            echo $topics[$i]["creator"];
            if(getPermission($db, $_COOKIE["username"], "del")){
                echo "<br><i><a class=\"dellink\" onClick=\"document.cookie='threadid=" . $topics[$i]["id"] . "'; window.location.href='deletetopic.php'\">delete topic</a></i>";
            }
            echo "</div>";
            echo "<br>";
            echo "</a>";
        }
    }else{
        echo "You do not have permission to view this page";
    }
    end:
?>
