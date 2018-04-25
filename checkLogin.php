<?php
    //checkLogin.php

    session_start();

    $user = $_GET['txt_username'];
    $pwd   = $_GET['txt_password'];

    if(isset($_GET['btn_login'])){
        // login complete
        if(($user == 'E1') && ($pwd == '1234')){
            $_SESSION['userID'] = $user;   // global variable

            header('location: employee.php');   // redirect to employee.php

        }else{  // login failed
            echo "Login Failed!";
        }
    }
    else if(isset($_GET['btn_logout'])){
        session_destroy();
        header('location: login.php');
    }
?>