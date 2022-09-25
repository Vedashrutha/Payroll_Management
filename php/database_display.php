<!DOCTYPE html>
<head>

<title>DATABASE</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/download.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
<h1 style="text-align:center; color:#000000;"><br>Organization Database</h1>
<br>
<h2 style="text-align:left; color:#FF0000;" >&nbsp;&nbsp;Employees</h2>
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
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Dept No.</th>
                      
                <!-- <th>Update</th>
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
							$query1=mysqli_query($connect,"select * from employee");
							while($row=mysqli_fetch_array($query1))
								{ 
									$sl++;
								?>
					<tr>
						<td><?php echo $sl; ?></td>
											
                      <td><?php echo $row['Eid']; ?></td>
                      <td><?php echo $row['Name']; ?></td>
                      <td><?php echo $row['Phone']; ?></td>
                      <td><?php echo $row['Email']; ?></td>
                      <td><?php echo $row['Address']; ?></td>
                      <td><?php echo $row['Dno']; ?></td>
                      
											<!--<td><i class="fa fa-pencil-square-o"></i></td>
											<td><i class="fa fa-trash"></i></a> -->
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

<h2 style="text-align:left; color:#FF0000;" >&nbsp;&nbsp;Departments</h2>
<div class="jumbotron">
  <div class="card">
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>Department</th>
                      <th>Department Number</th>
                     <!-- 
                      <th>Update</th>
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
							$query1=mysqli_query($connect,"select * from department");
							while($row=mysqli_fetch_array($query1))
								{ 
									$sl++;
								?>
					<tr>
						<td><?php echo $sl; ?></td>
											
                      <td><?php echo $row['Dept_name']; ?></td>
                      <td><?php echo $row['Dnumber']; ?></td>
                      
										<!--<td><i class="fa fa-pencil-square-o"></i></td>
											<td><i class="fa fa-trash"></i></a> -->
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

<h2 style="text-align:left; color:#FF0000;" >&nbsp;&nbsp;Salary</h2>
<div class="jumbotron">
  <div class="card">
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>SSN</th>
                      <th>Salary</th>
                      <th>Allowance</th>
                     <!-- 
                      <th>Update</th>
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
							$query1=mysqli_query($connect,"select * from salary");
							while($row=mysqli_fetch_array($query1))
								{ 
									$sl++;
								?>
					<tr>
						<td><?php echo $sl; ?></td>
											
                      <td><?php echo $row['Eid']; ?></td>
                      <td><?php echo $row['SalaryAmount']; ?></td>
                      <td><?php echo $row['Allowance']; ?></td>
                      
										<!--<td><i class="fa fa-pencil-square-o"></i></td>
											<td><i class="fa fa-trash"></i></a> -->
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

<h2 style="text-align:left; color:#FF0000;" >&nbsp;&nbsp;Loan</h2>
<div class="jumbotron">
  <div class="card">
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>Limit Amount</th>
                      <th>Loan</th>
                      <th>Due</th>
                      <th>SSN</th>
                     <!-- 
                      <th>Update</th>
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
							$query1=mysqli_query($connect,"select * from loan");
							while($row=mysqli_fetch_array($query1))
								{ 
									$sl++;
								?>
					<tr>
						<td><?php echo $sl; ?></td>
											
                      <td><?php echo $row['LimitAmount']; ?></td>
                      <td><?php echo $row['LoanAmount']; ?></td>
                      <td><?php echo $row['DueDate']; ?></td>
                      <td><?php echo $row['Eid']; ?></td>
                      
										<!--<td><i class="fa fa-pencil-square-o"></i></td>
											<td><i class="fa fa-trash"></i></a> -->
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

<h2 style="text-align:left; color:#FF0000;" >&nbsp;&nbsp;TAX</h2>
<div class="jumbotron">
  <div class="card">
      <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>SSN</th>
                      <th>Tax</th>
                     <!-- 
                      <th>Update</th>
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
							$query1=mysqli_query($connect,"select * from tax");
							while($row=mysqli_fetch_array($query1))
								{ 
									$sl++;
								?>
					<tr>
						<td><?php echo $sl; ?></td>
                      <td><?php echo $row['Eid']; ?></td>
                      <td><?php echo $row['TaxAmount']; ?></td>
                      
										<!--<td><i class="fa fa-pencil-square-o"></i></td>
											<td><i class="fa fa-trash"></i></a> -->
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
<form name="form" action="download_backup.php" method="post">
    <button type="submit" class="button">
      <span class="button__text">Download</span>
      <span class="button__icon">
        <ion-icon name="cloud-download-outline"></ion-icon>
      </span>
    </button>
  </form>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<style>
  .button {
  display: flex;
  height: 50px;
  padding: 0;
  background: #009578;
  border: none;
  outline: none;
  border-radius: 5px;
  overflow: hidden;
  font-family: "Quicksand", sans-serif;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
}

.button:hover {
  background: #008168;
}

.button:active {
  background: #006e58;
}

.button__text,
.button__icon {
  display: inline-flex;
  align-items: center;
  padding: 0 24px;
  color: #fff;
  height: 100%;
}

.button__icon {
  font-size: 1.5em;
  background: rgba(0, 0, 0, 0.08);
}
</style>
</html>