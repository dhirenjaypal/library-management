<html>
<head>
	<title>Plans</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
	tr:hover{
		background-color: skyblue;
	}
	</style>
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item active" aria-current="page">Accounts</li>
	</ol>
</nav>

<!-- Table for members  -->
<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
<h2>List of Accounts</h>
<a class="btn btn-info" href='./createAccount.php' >Insert New Account</a>
</div>
<?php

require("./Database.php");
use dboperations\helper\Database as db;
use dboperations\helper\Accounts as ac;

if(isset($_GET["id"])){
	$result=ac::delete($_GET['id']);
	if(!$result)
		echo "Something went wrong";
}

$result=db::selectall("accounts");
echo "<table class='table table-bordered table-primary p-4'>";
echo //"<caption class='text-white'>List of plans</caption>
"<tr class='bg-primary text-white'>
<th>#</th>
<th>Opening Date</th>
<th>Status</th>
<th>Member</th>
<th>Plan</th>
<th>remove</th>
<th>Update</th>
</tr>";
$i=0;
while($row=mysqli_fetch_assoc($result)){
	$i=$i+1;
	echo "<tr>
	<td>".$i."</td>
	<td>".$row['openingDate']."</td>
	<td>".$row['status']."</td>
	<td>";
	$member=db::selectrow("members", $row['members_id']);
	echo $member['name']."</td><td>";
	$plan=db::selectrow("plans", $row['plans_id']);
	echo $plan['name']."</td>
	<td><a class='btn btn-danger' href='./viewAccounts.php?id=".$row['id']."'>Remove</a></td>
	<td><a class='btn btn-info' href='./updateAccount.php?id=".$row['id']."'>Update</a></td>
	</tr>";
}
echo "</table>";
?>
</div>
</body>
</html>
