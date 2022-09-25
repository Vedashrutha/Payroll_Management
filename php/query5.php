<!DOCTYPE html>
<head>

<title>Bangalore Employees</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<h1 style="text-align:center; color:#000000;" ><br>Employees Living in Bangalore</h1>
<br>
<div class="jumbotron">
    <div class="card">
      <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>SSN</th>
                      <th>Name</th>
                      <th>City</th>
                      
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
                               $result=mysqli_query($connect,"SELECT e.Eid,e.Name
                                                                FROM employee e
                                                                WHERE e.Address='Bangalore';");
							    while($row=mysqli_fetch_array($result))
								{ 
									$sl++;
								?>
					<tr>
					  <td><?php echo $sl; ?></td>
                      <td><?php echo $row['Eid']; ?></td>
                      <td><?php echo $row['Name']; ?></td>
                      <td>Bangalore</td>
                      
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
