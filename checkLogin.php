<?php
    //checkLogin.php
    require("connectDB.php");   // connect database

    session_start();

    $user = $_GET['txt_username'];
    $pwd   = $_GET['txt_password'];

    $sql = "SELECT * FROM employee WHERE USERNAME='" . $user . "' AND PASSWORD='" . md5($pwd) . "'";
    //echo $sql;

    $result = $conn->query($sql);

    // User click Login button
    if(isset($_GET['btn_login'])){
        // login complete

        if ($result->num_rows > 0){    // found username and password in database
            $row = $result->fetch_assoc();              // read data from result        
            $_SESSION['userID']   = $row["EMP_ID"];     // global variable
            $_SESSION['emp_name'] = $row["EMP_NAME"];   // global variable

            header('location: employee.php');           // redirect to employee.php

        }else{  // login failed
            echo "Login Failed!";
        }
    }
    // User click Logout button
    else if(isset($_GET['btn_logout'])){
        session_destroy();  // destroy global variable
        header('location: login.php');
    }
?>