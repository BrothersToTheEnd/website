<html>
    <head>
        <link rel="stylesheet" href="brotherstotheend.css">
    </head>
    <body>
        <?php require "userbar.php" ?>
        <h1> Brothers to the End</h1>
        <div class="main">
            <?php
                if($_POST["newpassword"]!=$_POST["confirmpassword"]){
                    echo "Passwords do not match";
                    goto end;
                }
                $db=getMySqli();
                $results= $db->query("select * from users where name=\"". $_POST["newuser"] ."\"");
                if($results->num_rows!=0){
                    echo "Username already taken";
                    goto end;
                }
                if((checkLogin($db, $_COOKIE["username"], $_COOKIE["password"]))&&(getPermission($db, $_COOKIE["username"], "newuser"))){
                    $db->query("insert into users values (\"" . $_POST["newuser"] . "\", \"" . $_POST["newpassword"] . "\");");
                    $newPerms["createuser"]=0;
                    if($_POST["cancreateuser"]=="on"){
                        $newPerms["createuser"]=1;
                    }
                    $db->query("insert into permissions values (\"" . $_POST["newuser"] . "\", " . $newPerms["createuser"] . ", 0);");
                    echo "Successfully created user.";
                }else{
                    echo "You do not have permission to create a new user";
                }
                end:
             ?>
        </div>
    </body>
</html>
