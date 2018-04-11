<?php
    //update_employee.php
    
    require("connectDB.php");

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