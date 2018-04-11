<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "company";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    mysqli_set_charset($conn, "utf8");

    $id = $_GET['id'];

    // SQL
    $sql = "DELETE FROM employee WHERE EMP_ID = ". $id;
    $result = $conn->query($sql);

    echo $sql;
    header("location:employee.php");
    exit(0);
?>