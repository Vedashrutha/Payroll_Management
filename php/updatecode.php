<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'veda');

    if(isset($_POST['updatedata']))
    {   
        $Eid = $_POST['Eid'];
        $Name = $_POST['Name'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        $Address = $_POST['Address'];

        $query = "UPDATE employee SET Name='$Name', Phone='$Phone',Email='$Email',Address='$Address' WHERE Eid='$Eid'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:employeedisplay.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
    mysqli_close($connection);
?>