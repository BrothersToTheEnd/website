
<html>
    <head>
        <link rel="stylesheet" href="brotherstotheend.css">
    </head>
    <body>
        <?php require "userbar.php" ?>
        <h1> Brothers to the End</h1>
        <div class="main">
            <h2>Add a new account</h2>
            <form action="useradded.php" method="post">
                <input type="text" placeholder=" new username" name="newuser">
                <br>
                <input type="password" placeholder="new password" name="newpassword">
                <br>
                <input type="password" placeholder="confirm password" name="confirmpassword">
                <br>
                <input type="checkbox" name="cancreateuser">allow this user to create new users
                <br>
                <input type="submit" value="Create user">
            </form>
        </div>
    </body>
</html>
