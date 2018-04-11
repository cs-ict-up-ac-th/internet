<html>
    <h1>EMPLOYEE.PHP</h1>
    <body>  
        <form action="update_employee.php" method="GET">
            ID :    <input type="text" name="emp_id"> <br/>
            Name:   <input type="text" name="emp_name"> <br/>
            Gender: <input type="radio" name="emp_gender" value="M" checked>Male
                    <input type="radio" name="emp_gender" value="F">Female <br/>
            Department:
                    <select name="dept_id">
                        <option value="D1">Account</option>
                        <option value="D2">IT</option>
                    </select> <br/>
                    <button>Add Employee</button>
        </form>
  
<?php
    require("connectDB.php");

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

   