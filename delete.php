<?php
    require("connectDB.php");

    $id = $_GET['id'];

    // SQL
    $sql = "DELETE FROM employee WHERE EMP_ID = ". $id;
    $result = $conn->query($sql);

    echo $sql;
    header("location:employee.php");
    exit(0);
?>