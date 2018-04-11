<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<?php

// CONNECT DB
$con = mysqli_connect('localhost','root','','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"my_db");

// SELECT SQL
$sql="SELECT * FROM user";

// EXECUTE SQL
$result = mysqli_query($con,$sql);

?>
<form>
<select name="users" onchange="showUser(this.value)">
    <option value="">Select a person:</option>    
<?php    
while($row = mysqli_fetch_array($result)) {

    echo "<option value =" . $row['id'] .  ">" . $row['FirstName'] . " "  . $row['LastName'] . "</option>";

}

mysqli_close($con);
?>    
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>