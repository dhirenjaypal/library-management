<?php
	if(!class_exists('Database') and !class_exists('Plans'))
		require("./Database.php");  //already included
    use dboperations\helper\Plans as plans;
	use dboperations\helper\Database as db;
	if(isset($_POST["submit"])){
		$id=$_POST["id"];
    	$name=$_POST["name"];
    	$daysCount=$_POST["daysCount"];
    	$maxBooks=$_POST["maxBooks"];
    	$amount=$_POST["amount"];
    	$maxIssueDuration=$_POST["maxIssueDuration"];
    	$penaltyAmount=$_POST["penaltyAmount"];
		$result=plans::update($id,$name, $daysCount, $maxBooks, $amount, $maxIssueDuration, $penaltyAmount);
		if($result)
			header("Location: ./viewData.php");
		else
			header("location: ./updatePlans.php?id=$id&error=1");
	}
?>
<html>
<head>
	<title>Update Plan</title>
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
	<font size="5px"><b>Update Plan</b></font>
</div>
	<center>
    <?php
		if($_GET['error']==1)
			echo "Something Went Wrong";
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $result=db::query("select * from plans where id=$id");
			if($result)
            	$row=mysqli_fetch_assoc($result);
        }
        else
            echo "Something Went Wrong";
    ?>
    <form method="post" action="./updatePlans.php">

			<input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Planname" name="name" value="<?php echo $row['name'];?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Plan Days Count</span>
				</div>
				<input type="number" class="form-control" placeholder="days" name="daysCount" max=365 value="<?php echo $row['daysCount']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Maximum Books</span>
				</div>
				<input type="number" class="form-control" placeholder="any number less than 12" name="maxBooks" max=12 value="<?php echo $row['maxBooks']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Amount</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="amount" value="<?php echo $row['amount']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Maximum Issue Duration</span>
				</div>
				<input type="number" class="form-control" placeholder="days" name="maxIssueDuration" value="<?php echo $row['maxIssueDuration']; ?>">
			</div>
			
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Penalty Amount</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="penaltyAmount" value="<?php echo $row['penalty']; ?>">
			</div>
			
		<input class="btn btn-block btn-primary" type="submit" name="submit" value="Update">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>
