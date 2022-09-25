
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
$SalaryAmount = mysqli_real_escape_string($link, $_POST['SalaryAmount']);
$Allowance = mysqli_real_escape_string($link, $_POST['Allowance']);


?>

<?php
// attempt insert query execution
$sql = "INSERT INTO salary (Eid, SalaryAmount, Allowance) VALUES ('$Eid', '$SalaryAmount', '$Allowance')";

if(mysqli_query($link, $sql)){
   echo "Data successfully Saved.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>