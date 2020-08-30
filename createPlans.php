<?php
	require("./Database.php");
    use dboperations\helper\Plans as plans;
	if(isset($_POST["submit"])){
		$name=$_POST["name"];
 	    $daysCount=$_POST["daysCount"];
		$maxBooks=$_POST["maxBooks"];
 		$amount=$_POST["amount"];
		$maxIssueDuration=$_POST["maxIssueDuration"];
		$penaltyAmount=$_POST["penaltyAmount"];
		
		$result=plans::insert($name, $daysCount, $maxBooks, $amount, $maxIssueDuration, $penaltyAmount);
		if($result)
			header("Location: ./viewData.php");
		else
			$error=true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Plan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<a class="btn btn-info" href='./viewData.php' >Back</a>
	<font size="5px"><b>Create New Plan</b></font>
</div>
<center>
<?php
if($error)
		echo "<font style='color: white'>Something went wrong</font>";
?>
<form method="post" action="./createPlans.php">

            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Planname" name="name">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Plan Days Count</span>
				</div>
				<input type="number" class="form-control" placeholder="days" name="daysCount" max=365>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Maximum Books</span>
				</div>
				<input type="number" class="form-control" placeholder="any number less than 12" name="maxBooks" max=12>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Amount</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="amount">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Maximum Issue Duration</span>
				</div>
				<input type="number" class="form-control" placeholder="days" name="maxIssueDuration">
			</div>
			
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Penalty Amount</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="penaltyAmount">
			</div>
			<input class="btn btn-block btn-primary" type="submit" name="submit" value="save">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>