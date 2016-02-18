<?php
    require "security.php";
    $db=getMySqli();
   if(checkLogin($db, $_POST["username"], $_POST["password"])){
       setcookie("username", $_POST["username"]);
       setcookie("password", $_POST["password"]);
       echo "<meta http-equiv=\"refresh\" content=\"0; url=main.php\" />";
   }else{
       echo "password incorrect";
       echo "<meta http-equiv=\"refresh\" content=\"0; url=index.html\"/>";
   }
   end:
?>
