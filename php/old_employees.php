<!DOCTYPE html>
<head>

<title>Ex-Employees</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>

<body>

<h1 style="text-align:center; color:#000000;"><br>Old Employees Details</h1>
<br>
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Employee Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="delete_forever.php" method="POST">

                    <div class="modal-body">
                        <input type="hidden" name="Eid1" id="Eid1">

                        <h5> Are you sure you want to Delete this Data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Continue to Delete </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

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
                      <th>Delete Forever</th>
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
							$query1=mysqli_query($connect,"SELECT * from deleted_employees");
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
                      <td>
                          <button type="button" class="btn btn-danger deletebtn">
                            <i class="fa fa-trash"></i>
                          </button>
                      </td>
					</tr>
                                     
										<?php } 
                    
                    
                                        
                                        ?>     
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
 <style>

    .btn-danger{
      background: #0099F5;
      width:36px;
      color:#FFFFFF; 
      border-radius: 4px;
      position:relative;
      border: none;
    }

    .btn-danger:hover{
      background:#FF0000 ;
      color:#FFFFFF;
      position:relative;
      border: none;
    }
  </style>

<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#Eid1').val(data[1]);

            });
        });
    </script>
       <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>
  </body>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
    } );
</script>
</html>