<html>
<head>
	<title>Issues</title>
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
		<li class="breadcrumb-item active" aria-current="page">Issues</li>
	</ol>
</nav>

<!-- Table for members  -->
<div class="card bg-info rounded-lg">
<div class="card-header bg-primary text-white text-center">
<h2>List of Issues</h>
<a class="btn btn-info" href='./createIssue.php' >Issue Book</a>
</div>
<?php

require("./Database.php");
use dboperations\helper\Database as db;

if(isset($_GET["id"])){
	$result=db::deleterow('issues',$_GET['id']);
	if(!$result)
		echo "Something went wrong";
}

$result=db::selectall("issues");
echo "<table class='table table-bordered table-primary'>";
echo "<tr class='bg-primary text-white'>
<th>#</th>
<th>Date</th>
<th>Status</th>
<th>Account</th>
<th>Book</th>
<th>Delete</th>
<th>Update</th>
</tr>";
$i=0;
while($row=mysqli_fetch_assoc($result)){
	$i=$i+1;
	echo "<tr>
	<td>".$i."</td>
	<td>".$row['dateOfIssue']."</td>
	<td>".$row['status']."</td>
	<td>";
	$ac=db::selectrow("accounts",$row['accounts_id']);
	$member=db::selectrow("members", $ac['members_id']);
	$plan=db::selectrow("plans", $ac['plans_id']);
	$book=db::selectrow("books",$row['books_id']);
	echo $member['name']." : ".$plan['name']."</td><td>"
	.$book['name']." by ".$book['authorName']."</td>
	<td><a class='btn btn-danger' href='./viewIssues.php?id=".$row['id']."'>Remove</a></td>
	<td><a class='btn btn-info' href='./updateIssue.php?id=".$row['id']."'>Update</a></td>
	</tr>";
}
echo "</table>";
?>
</div>
</body>
</html>