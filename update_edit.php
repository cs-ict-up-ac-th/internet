<?php
    //update_edit.php
    
    require("connectDB.php");

    $id = $_GET['emp_id'];
    $name = $_GET['emp_name'];
    $gender = $_GET['emp_gender'];
    $dept_id = $_GET['dept_id'];

    $sql  = "UPDATE employee SET EMP_ID = " . $id . ", ";
    $sql .= "EMP_NAME = '" . $name . "', ";
    $sql .= "EMP_GENDER = '" .  $gender . "', ";
    $sql .= "DEPT_ID = '" . $dept_id . "' ";
    $sql .= "WHERE EMP_ID = " . $id ;
    
    $result = $conn->query($sql);

    header("location:employee.php");
    exit(0);
 
?>