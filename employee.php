<?php
    // EMPLOYEE.PHP
    session_start();    // start session

    if(!isset($_SESSION['userID'])){    // if not authorized login
        header('location:login.php');
    }

    echo "Welcome, " . $_SESSION['emp_name'];
    
    if(isset($_GET['txt_search'])){
        $txt_search = $_GET['txt_search'];
        $sel_type   = $_GET['sel_type'];
    }
    else{
        $txt_search = "";
        $sel_type   = "";
    }
    
?>

<html>
    
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
        $(document).ready(function() {
            $("#txt_search1").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });      
      </script>
    </head>

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

        <form action="employee.php" method="GET">
            <input type="text" name="txt_search" id="txt_search" value=<?php echo $txt_search; ?>>

            <select name="sel_type">
                <option value=1 <?php if($sel_type=="1") echo "selected"?> >EMPLOYEE ID</option>
                <option value=2 <?php if($sel_type=="2") echo "selected"?>>EMPLOYEE NAME</option>
                <option value=3 <?php if($sel_type=="3") echo "selected"?>>GENDER</option>
                <option value=4 <?php if($sel_type=="4") echo "selected"?>>DEPARTMENT</option>
            </select>

            <button name="btn_search">Search</button>
        </form>
  
<?php
    require("connectDB.php");

    if(trim($txt_search) == ""){
        $sql = "SELECT e.EMP_ID, e.EMP_NAME, e.EMP_GENDER, e.DEPT_ID, d.DEPT_NAME from employee AS e, department AS d WHERE e.DEPT_ID = d.DEPT_ID";            
    }
    else{
        
        $sql = "SELECT e.EMP_ID, e.EMP_NAME, e.EMP_GENDER, e.DEPT_ID, d.DEPT_NAME from employee AS e, department AS d WHERE e.DEPT_ID = d.DEPT_ID";
                 
        if($sel_type == 1){ // FIND BY EMP_ID
            $sql .= " AND e.EMP_ID = " . $txt_search;
        }
        else if($sel_type == 2){ // FIND BY EMP_NAME
            $sql .= " AND e.EMP_NAME LIKE '%" . $txt_search . "%'";
        }
        else if($sel_type == 3){ // FIND BY EMP_GENDER
            $sql .= " AND e.EMP_GENDER = '" . $txt_search . "'";            
        }
        else if($sel_type == 4){ // FIND BY DEPARTMENT_NAME
            $sql .= " AND d.DEPT_NAME = '" . $txt_search . "'";            
        }                

    }

    echo $sql;

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

   