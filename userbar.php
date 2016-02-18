<div class="userbar">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if($(window).scrollTop()>0){
                    $(".userbar").css("top", "auto");
                    $(".userbar").css("bottom", "0px");
                }else{
                    $(".userbar").css("top", "0px");
                    $(".userbar").css("bottom", "auto");
                }
            })
        })
    </script>
    <?php
        require "security.php";
        echo "<a href=\"main.php\" id=\"name\" class=\"invisible\"> Hello, " . $_COOKIE["username"] . "</a>";
        $db=getMySqli();
        if(getPermission($db, $_COOKIE["username"], "newuser")){
            echo " &#9;<a class=\"userbar\" onClick=\"window.location.href='adduser.php'\">Add user</a>";

        }
        echo "<a class=\"userbar\" onClick=\"window.location.href='newthread.php'\">Create Topic</a>";
     ?>
     <a class="userbar" button onClick="document.cookie='username=0'; document.cookie='password=0';window.location.href='index.html'">Logout</a>
</div>
