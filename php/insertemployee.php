<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "veda");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$Name = mysqli_real_escape_string($link, $_POST['Name']);
$Eid = mysqli_real_escape_string($link, $_POST['Eid']);
$Phone = mysqli_real_escape_string($link, $_POST['Phone']);
$Email = mysqli_real_escape_string($link, $_POST['Email']);
$Address = mysqli_real_escape_string($link, $_POST['Address']);
$Dno = mysqli_real_escape_string($link, $_POST['Dno']);


// attempt insert query execution
$sql = "INSERT INTO employee (Name, Eid, Phone, Email, Address, Dno) VALUES ('$Name', '$Eid', '$Phone', '$Email', '$Address', '$Dno')";
if(mysqli_query($link, $sql)){
   echo "Data Saved Successfully!";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>