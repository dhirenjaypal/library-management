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
		<li class="breadcrumb-item active" aria-current="page">Plans</li>
	</ol>
</nav>

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<h2>List of Plans</h>
	<a class="btn btn-info" href='./createPlans.php' >Insert New Plan</a>
</div>
<?php
if(!class_exists('Database') and !class_exists('Plans'))
	require("./Database.php");
use dboperations\helper\Database as db;
use dboperations\helper\Plans as plans;
use dboperations\helper\Members as users;

if(isset($_GET["type"])){
	if($_GET["type"]=="plan"){
	$result=plans::delete($_GET["id"]);
	if(!$result)
		echo "Something went wrong";
	}
}
    $result=db::selectall("plans");
    echo "<table class='table table-bordered table-primary p-4'>";
    echo //"<caption class='text-white'>List of plans</caption>
			"<tr class='bg-primary text-white'>
    		<th>#</th>
    		<th>Name</th>
    		<th>Days Count</th>
    		<th>Max Number of books</th>
    		<th>Plan Price</th>
    		<th>Maximum Issue Duration</th>
    		<th>Penalty Amount</th>
    		<th>Delete</th>
    		<th>Update</th>
    	  </tr>";
     $i=0;
    while($row=mysqli_fetch_assoc($result)){
      $i=$i+1;
    	echo "<tr>
    			<td>".$i."</td>
    			<td>".$row['name']."</td>
    			<td>".$row['daysCount']."</td>
    			<td>".$row['maxBooks']."</td>
    			<td>".$row['amount']."</td>
    			<td>".$row['maxIssueDuration']."</td>
    			<td>".$row['penalty']."</td>
    			<td><a class='btn btn-danger' href='./viewData.php?type=plan&id=".$row['id']."'>Remove</a></td>
    			<td><a class='btn btn-info' href='./updatePlans.php?id=".$row['id']."'>Update</a></td>
    		   </tr>";
    }
    echo "</table>";
?>
</div>


</body>
</html>
