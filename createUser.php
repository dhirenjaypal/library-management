<?php
	require("./Database.php");
    use dboperations\helper\Members as users;

	if(isset($_POST["submit"])){
		$name=$_POST["name"];
		$address=$_POST["address"];
 	    $phone=$_POST["phone"];
		$emailAddress=$_POST["emailAddress"];
 		$isActive=$_POST["isActive"];
		if($isActive!='YES')
			$isActive='NO';
		$result=users::insert($name, $address, $phone, $emailAddress, $isActive);
		if($result)
			header("Location: ./viewData.php");
		else
			$error=true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Member</title>
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
	<font size="5px"><b>Create New Member</b></font>
</div>
<center>
<?php
if($error)
		echo "<font style='color: white'>Something went wrong</font>";
?>
<form method="post" action="./createUser.php">

            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Member's name" name="name">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Address</span>
				</div>
				<input type="text" class="form-control" placeholder="full address" name="address">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Phone</span>
				</div>
				<input type="number" class="form-control" placeholder="phone number" name="phone">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Email</span>
				</div>
				<input type="email" class="form-control" placeholder="Email Address" name="emailAddress">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Is active</span>
				</div>
				<input type="checkbox" class="form-control" name="isActive" value="YES">
			</div>
			
			<input class="btn btn-block btn-primary" type="submit" name="submit" value="save">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>