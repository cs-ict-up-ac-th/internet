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

    $id = $_GET['emp_id'];
    $name = $_GET['emp_name'];
    $gender = $_GET['emp_gender'];
    $dept_id = $_GET['dept_id'];

    $sql = "INSERT INTO employee (EMP_ID, EMP_NAME, EMP_GENDER, DEPT_ID) VALUES ";
    $sql .= "(" . $id . ", '" . $name . "', '" . $gender . "', '" . $dept_id ."')";

    $result = $conn->query($sql);

    header("location:employee.php");
    exit(0);

    echo $sql;
?>