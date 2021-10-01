
<?php
$conn = mysqli_connect("localhost","root","","intershaladb");

if(!$conn)
{
	echo "Database connection faild...";
}
else {
	mysqli_select_db($conn, 'intershaladb');
}
?>