<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "veda");
$output = '';
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_POST['deletedata']))
{
    $sql = "DELETE FROM attendance";
    if(mysqli_query($link, $sql)){
        echo "Records were deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
else
{
    $query = "SELECT e.Eid,e.Name,e.Email,a.Monthno,a.Present,a.Absent from employee e,attendance a where e.Eid=a.Eid;";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) > 0)
    {
     $output .= '
      <table class="table" bordered="1">  
                       <tr>  
                            <th>SSN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Month No.</th>
                            <th>Present</th>
                            <th>Absent</th>  
                       </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                            <td>'.$row["Eid"].'</td>  
                            <td>'.$row["Name"].'</td> 
                            <td>'.$row["Email"].'</td> 
                            <td>'.$row["Monthno"].'</td>  
                            <td>'.$row["Present"].'</td>  
                            <td>'.$row["Absent"].'</td> 
                       </tr>
      ';
     }
     $output .= '</table>';
     header('Content-Type: application/xls');
     header('Content-Disposition: attachment; filename=Employee_Data.xls');
     echo $output;
    }
}
// Close connection
mysqli_close($link);
?>