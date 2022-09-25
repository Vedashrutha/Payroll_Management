<!DOCTYPE html>
<head>

<title>Display Employees</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
<h1 style="text-align:center; color:#000000;" ><br>Details of Employees</h1>
<br>

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Employee Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">
                        <input type="hidden" name="Eid" id="Eid">
                        <div class="form-group">
                            <label>  Name </label>
                            <input type="text" name="Name" id="Name" class="form-control"
                                placeholder="Enter Employee Name">
                        </div>
                        <div class="form-group">
                            <label> Phone </label>
                            <input type="text" name="Phone" id="Phone" class="form-control"
                                placeholder="Enter 10 digit mobile number">
                        </div>

                        <div class="form-group">
                            <label> Email</label>
                            <input type="email" name="Email" id="Email" class="form-control"
                                placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <label> Address</label>
                            <input type="text" name="Address" id="Address" class="form-control"
                                placeholder="Enter Employee Address">
                        </div>
                        <div class="form-group">
                            <label> Department</label>
                            <input type="text" name="Dno" id="Dno" class="form-control"
                                placeholder="Enter Employee Address" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    
    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
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

                <form action="deletecode.php" method="POST">

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

                                        <!--b r e a k -->
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
                      <th>Edit</th>
                      <th>Delete</th>
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
                        <td>
                        <button type="button" class="btn btn-success editbtn" >
                            <i class="fa fa-pencil-square-o">
                        </td>
                      <td>
                      <button type="button" class="btn btn-danger deletebtn">
                            <i class="fa fa-trash"></i>
                      </td>
                      
											
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
  <style>
    .btn-success{
      background: #0099F5;
      width:36px;
      color:#FFFFFF ; 
      border-radius: 4px;
      position:relative;
      border: none;
    }

    .btn-success:hover{
      background:#00D584 ;
      color:#131314;
      position:relative;
      border: none;
    }

    .btn-danger{
      background: #0099F5;
      width:36px;
      color:#FFFFFF  ; 
      border-radius: 4px;
      position:relative;
      border: none;
    }

    .btn-danger:hover{
      background:#FF0000 ;
      color:#131314;
      position:relative;
      border: none;
    }
  </style>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


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

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#Eid').val(data[1]);
                $('#Name').val(data[2]);
                $('#Phone').val(data[3]);
                $('#Email').val(data[4]);
                $('#Address').val(data[5]);
                $('#Dno').val(data[6]);
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