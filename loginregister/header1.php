<?php
include_once('link.php');
include_once('connection.php');
session_start();
$email = $_SESSION['email'];

$id = $_SESSION['id'];
$email='';
$sql = "SELECT * FROM tbluser WHERE ID='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$email = $row["email"];
	}
}

?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">SignUp SignIn assesment</a>
		</div>
		<div class="dropdown navbar-centre" id="right">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $email;?>
			<span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="account.php">Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="welcome.php">home</a></li>
				<li><a href="dashboard.php"> DB dashboard</a></li>
			</ul>
		</div>
	</div>
</nav>