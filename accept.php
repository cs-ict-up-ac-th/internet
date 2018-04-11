<?php

    $id     = $_GET['stu_id'];
    $name   = $_GET['stu_name'];
    $gender = $_GET['stu_gender'];
    $status = $_GET['stu_status'];

    $hobby1 = "";

    if(isset($_GET['stu_hobby'])){
        $hobby = $_GET['stu_hobby'];
    }


    echo "ID = <input type='text' value='". $id . "'><br>";
    echo "Name = " .$name . "<br>";
    echo "Gender = ". $gender . "<br>";
    echo "Status = ". $status . "<br>";

    print_r($hobby);
    

?>