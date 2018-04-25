<?php
    // login.php
    echo md5("2345");
?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="checkLogin.php" method="GET">
            Username: <input type="text" name="txt_username"> <br/>
            Password: <input type="password" name="txt_password"> <br/>
            <button name="btn_login">Login</button>
            <button name="btn_logout">Logout</button>
        </form>
    </body>
</html>