<!DOCTYPE html>
<head>

<title>Department</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
<h1 style="text-align:center; color:#000000;"><br>Department Details</h1>
<br>
<div class="jumbotron">
  <div class="card">
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                        <!--<th>Sl No.</th>-->
                      <th>Department</th>
                      <th>Department Number</th>
                      
                     <!-- <th>Update</th>
                      <th>Delete</th>
                    </tr>-->
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
							$query1=mysqli_query($connect,"select * from department");
							while($row=mysqli_fetch_array($query1))
								{ 
									$sl++;
								?>
					<tr>
						<!--<td><?php echo $sl; ?></td>-->
											
                      <td><?php echo $row['Dept_name']; ?></td>
                      <td><?php echo $row['Dnumber']; ?></td>
                      <!--
											<td>
                        <button type="button" class="btn-primary">
                        <i class="fa fa-pencil-square-o">
                      </td>
                      <td>
                        <button type="button" class="btn-primary">
                        <i class="fa fa-trash"></i>
                      </td>
                -->
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

  <style>
    .btn-primary{
      background: #131314;
      width:25px;
      color:#FFFFFF  ; 
      border-radius: 7px;
      position:relative;
      border: none;
    }

    .btn-primary:hover{
      background:#21C5D9  ;
      color:#131314;
      border-radius: 7px;
      position:relative;
      border: none;
    }
  </style>

</body>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
    } );
</script>
</html>