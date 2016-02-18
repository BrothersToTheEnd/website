<html>
    <head>
        <link rel="stylesheet" href="brotherstotheend.css">
    </head>
    <body>
        <?php require "userbar.php";?>
        <h1>Brothers to the End</h1>
        <div class="main">
            <?php
                if(!checkLogin($db, $_COOKIE["username"], $_COOKIE["password"])){
                    echo "You do not have permission to view this page";
                    goto end;
                }
                $db=getMySqli();
                $result= $db->query("select * from subjects where id = \"". $_COOKIE["threadid"]."\"");
                if(!$result){
                    echo "No thread selected";
                    goto end;
                }
                $line1=$result->fetch_array();
                echo "<h2>" . $line1["name"] . "</h2>";
                echo "Created by " . $line1["creator"] . ".<br><br><hr>";
                $result=$db->query("select * from s" . $_COOKIE["threadid"]);
                $end=$result->num_rows;
                for($i=0; $i!=$end; $i++){
                    $line=$result->fetch_assoc();
                    echo "<div class=\"post\">";
                    echo "<div class=\"innerpost\">";
                    echo $line["post"];
                    echo "</div>";
                    echo "<span class=\"username\">";
                    echo $line["creator"];
                    echo "</span>";
                    if(getPermission($db, $_COOKIE["username"], "del")){
                        echo "<br><a class=\"dellink\" onClick=\"document.cookie='cpost=" . $line["id"] . "';window.location.href='delpost.php'\">Delete Post</a>";
                    }
                    echo "</div>";
                }
                end:
             ?>
             <div class="newpost">
                 <form action="newpost.php" method="post">
                    <input type="text" placeholder="Post" name="posttext">
                    <input type="submit" value="Post">
                 </form>
             </div>
        </div>
    </body>
</html>
