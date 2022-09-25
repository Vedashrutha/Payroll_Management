<?php   
$connect = mysqli_connect("localhost", "root", "", "veda");
$output = '';
 $query = "SELECT * FROM employee ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>SSN</th>
                         <th>Name</th>
                         <th>Phone</th>
                         <th>Email</th>   
                         <th>Address</th>  
                         <th>Department</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Eid"].'</td>  
                         <td>'.$row["Name"].'</td>  
                         <td>'.$row["Phone"].'</td>  
                         <td>'.$row["Email"].'</td>  
                         <td>'.$row["Address"].'</td>
                         <td>'.$row["Dno"].'</td>
                    </tr>
   ';
  }
}
 $query1 = "SELECT * FROM department ";
 $result1 = mysqli_query($connect, $query1);
 if(mysqli_num_rows($result1) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Dept Number</th>
                         <th>Dept Name</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result1))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Dnumber"].'</td>  
                         <td>'.$row["Dept_name"].'</td>  

    </tr>
   ';
  }
}

$query2 = "SELECT * FROM department ";
 $result1 = mysqli_query($connect, $query1);
 if(mysqli_num_rows($result1) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Dept Number</th>
                         <th>Dept Name</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result1))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Dnumber"].'</td>  
                         <td>'.$row["Dept_name"].'</td>  

    </tr>
   ';
  }

  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Employee_Data.xls');
  echo $output;
 }
 mysqli_close($connect);
?>