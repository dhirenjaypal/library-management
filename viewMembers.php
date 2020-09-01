<html>
<head>
	<title>Members</title>
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
		<li class="breadcrumb-item active" aria-current="page">Members</li>
	</ol>
</nav>

<!-- Table for members  -->
<div class="card bg-info rounded-lg">
<div class="card-header bg-primary text-white text-center">
<h2>List of Members</h>
<a class="btn btn-info" href='./createMember.php' >Insert New Member</a>
</div>
<?php

require("./Database.php");
use dboperations\helper\Database as db;
use dboperations\helper\Plans as plans;
use dboperations\helper\Members as users;

if(isset($_GET["type"])){
	if($_GET["type"]=="user");{
		$result=users::delete($_GET["id"]);
	if(!$result)
		echo "Something went wrong";
	}
}
$result=db::selectall("members");
echo "<table class='table table-bordered table-primary'>";
echo //"<caption class='text-white'>List of plans</caption>
"<tr class='bg-primary text-white'>
<th>#</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Email Address</th>
<th>Is active</th>
<th>Delete</th>
<th>Update</th>
</tr>";
$i=0;
while($row=mysqli_fetch_assoc($result)){
	$i=$i+1;
	echo "<tr>
	<td>".$i."</td>
	<td>".$row['name']."</td>
	<td>".$row['address']."</td>
	<td>".$row['phone']."</td>
	<td>".$row['emailAddress']."</td>
	<td>";
	if($row['isActive']=='YES')
		echo "<input class='input-group' type='checkbox' checked disabled>";
	else
		echo "<input class='input-group' type='checkbox' disabled>";
	echo "</td>
	<td><a class='btn btn-danger' href='./viewMembers.php?type=user&id=".$row['id']."'>Remove</a></td>
	<td><a class='btn btn-info' href='./updateMember.php?id=".$row['id']."'>Update</a></td>
	</tr>";
}
echo "</table>";
?>
</div>
</body>
</html>
