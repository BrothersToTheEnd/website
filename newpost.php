<?php
require "security.php";

$db=getMySqli();

if(checkLogin($db, $_COOKIE["username"], $_COOKIE["password"])){
    $db->query("insert into s" . $_COOKIE["threadid"] . " (post, creator) values (\"" . $_POST["posttext"] . "\", \"" . $_COOKIE["username"] . "\")");
    echo "<meta http-equiv=\"refresh\" content=\"0; viewthread.php\">";
}else {
    echo "You do not have permission to post.";
}

?>
