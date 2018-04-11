<?php
    require("connectDB.php");

    $id = $_GET['id'];

    $sql = "SELECT EMP_ID, EMP_NAME, EMP_GENDER, DEPT_ID FROM employee WHERE EMP_ID = " . $id;

    //echo $sql;

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    //echo $row["EMP_NAME"];
?>

<html>
    <h1>EDIT.PHP</h1>
    <body>  
        <form action="update_edit.php" method="GET">
            ID :    <input type="hidden" name="emp_id" value=<?php echo $row["EMP_ID"]; ?>><?php echo $row["EMP_ID"]; ?> <br/>
            Name:   <input type="text" name="emp_name" value=<?php echo $row["EMP_NAME"]; ?>> <br/>
            Gender: <input type="radio" name="emp_gender" value="M" <?php if($row["EMP_GENDER"]=="M") echo "checked"; ?>>Male
                    <input type="radio" name="emp_gender" value="F" <?php if($row["EMP_GENDER"]=="F") echo "checked"; ?>>Female <br/>
            Department:
                    <select name="dept_id">
                        <option value="D1" <?php if($row["DEPT_ID"]=="D1") echo "selected"; ?>>Account</option>
                        <option value="D2" <?php if($row["DEPT_ID"]=="D2") echo "selected"; ?>>IT</option>
                    </select> <br/>
                    <button>Edit Employee</button>
        </form>
  
<?php

    $sql = "SELECT e.EMP_ID, e.EMP_NAME, e.EMP_GENDER, e.DEPT_ID, d.DEPT_NAME from employee AS e, department AS d WHERE e.DEPT_ID = d.DEPT_ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>NAME</td>";
            echo "<td>GENDER</td>";
            echo "<td>DEPARTMENT</td>";
            echo "<td>EDIT</td>";
            echo "<td>DELETE</td>";
        echo "</tr>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo  "<td>" . $row["EMP_ID"] . "</td>";
                echo  "<td>" . $row["EMP_NAME"] . "</td>";
                echo  "<td>" . $row["EMP_GENDER"] . "</td>";
                echo  "<td>" . $row["DEPT_NAME"] . "</td>";
                echo "<td><a href='edit.php?id=". $row["EMP_ID"] ."'>EDIT</a></td>";
                echo "<td><a href='delete.php?id=". $row["EMP_ID"] ."'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
?>
    </body>
</html>

   