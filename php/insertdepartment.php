<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "veda");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$Dnumber = mysqli_real_escape_string($link, $_POST['Dnumber']);
$Dept_name = mysqli_real_escape_string($link, $_POST['Dept_name']);


// attempt insert query execution
$sql = "INSERT INTO department (Dnumber, Dept_name) VALUES ('$Dnumber', '$Dept_name')";
if(mysqli_query($link, $sql)){
   echo "Data successfully Saved.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>