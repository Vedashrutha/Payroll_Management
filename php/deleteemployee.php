<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "veda");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$Eid = mysqli_real_escape_string($link, $_POST['Eid']);


// attempt insert query execution
$sql = "DELETE FROM employee WHERE Eid='$Eid'";
if(mysqli_query($link, $sql)){
   echo "Data successfully Deleted.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>