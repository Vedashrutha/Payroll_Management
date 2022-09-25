<!DOCTYPE html>
<head>

<title>Salary | Aggregates</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<h1 style="text-align:center; color:#000000;" ><br>Salary - Aggregate</h1>
<br>
<div class="jumbotron">
    <div class="card">
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Total Salary Amount</th>
                      <th>Maximum Salary Amount</th>
                      <th>Minimum Salary Amount</th>
                      <th>Average Salary Amount</th>
                      
                      <!--<th>Update</th>
                      <th>Delete</th>-->
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                            $connect=mysqli_connect("localhost","root","","veda");
                            // Check connection
                            if (mysqli_connect_errno())
                            {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
   							$sl=0;
                               $result1=mysqli_query($connect,"SELECT SUM((s.SalaryAmount*a.Present)+s.Allowance) AS summation,
                               MAX((s.SalaryAmount*a.Present)+s.Allowance)  AS maximum,
                               MIN((s.SalaryAmount*a.Present)+s.Allowance)  AS minimum,
                               ROUND(AVG((s.SalaryAmount*a.Present)+s.Allowance),2)  AS average
                               FROM salary s,attendance a;");
							    while($row=mysqli_fetch_array($result1))
								{ 
									$sl++;
								?>
					<tr>
					  <!--<td><?php echo $sl; ?></td>						-->
                      <td><?php echo $row['summation']; ?></td>
                      <td><?php echo $row['maximum']; ?></td>
                      <td><?php echo $row['minimum']; ?></td>
                      <td><?php echo $row['average']; ?></td>
                      
											<!--<td><i class="fa fa-pencil-square-o"></i></td>
											<td><i class="fa fa-trash"></i></a>-->
                    </td>
					</tr>
                                     
										<?php } 
                    
                    
                                       mysqli_close($connect); 
                                        ?>     
                  </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
</body>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
    } );
</script>
</html>