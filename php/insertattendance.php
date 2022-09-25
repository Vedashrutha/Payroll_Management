<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "veda");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$Present = mysqli_real_escape_string($link, $_POST['Present']);
$Monthno = mysqli_real_escape_string($link, $_POST['Monthno']);
$Eid= mysqli_real_escape_string($link, $_POST['Eid']);
$Absent= mysqli_real_escape_string($link, $_POST['Absent']);

// attempt insert query execution
$sql = "INSERT INTO attendance (Present, Monthno, Eid,Absent) VALUES ('$Present', '$Monthno ', '$Eid','$Absent')";
if(mysqli_query($link, $sql)){
   echo "Data successfully Saved.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>
   <script src="js/sweetalert.min.js"></script>
