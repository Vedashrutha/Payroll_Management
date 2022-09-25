<!DOCTYPE html>
<body>
<body bgcolor="limegreen">
<h1>Attendance </h1>
</body>
</html>
<?php
$connect=mysqli_connect("localhost","root","","veda");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result=mysqli_query($connect,"SELECT * from attendance");

echo "<table border='1' width='500' cellpadding=5celspacing='5'>
<tr>
<th>Eid</th>
<th>Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Eid'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($connect);
?>
