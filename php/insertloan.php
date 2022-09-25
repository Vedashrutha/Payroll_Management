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
$LimitAmount = mysqli_real_escape_string($link, $_POST['LimitAmount']);
$DueDate = mysqli_real_escape_string($link, $_POST['DueDate']);
$LoanAmount = mysqli_real_escape_string($link, $_POST['LoanAmount']);

// attempt insert query execution
$sql = "INSERT INTO loan (Eid, LimitAmount, DueDate, LoanAmount) VALUES ('$Eid', '$LimitAmount', '$DueDate', '$LoanAmount')";
if(mysqli_query($link, $sql)){
   echo "Data successfully Saved.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>