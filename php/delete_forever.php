
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'veda');

if(isset($_POST['deletedata']))
{
    $Eid = $_POST['Eid1'];

    $query = "DELETE FROM deleted_employees WHERE Eid='$Eid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:old_employees.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
mysqli_close($connection);
?>