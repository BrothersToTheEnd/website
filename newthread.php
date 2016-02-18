<html>
    <head>
        <link rel="stylesheet" href="brotherstotheend.css">
    </head>
    <body>
        <?php require "userbar.php" ?>
        <h1> Brothers to the End</h1>
        <div class="main">
            <h2> Create a New Topic</h2>
            <form action="threadadded.php" method="post">
                    <input type="text" placeholder="Title" name="title">
                    <input type="submit" value="Create">
            </form>
        </div>
    </body>
</html>
