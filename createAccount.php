<?php
	require("./Database.php");
    use dboperations\helper\Database as db;
	use dboperations\helper\Accounts as ac;

	if(isset($_POST["submit"])){
		$openingDate=$_POST["openingDate"];
		$status=$_POST["status"];
 	    $members_id=$_POST["members_id"];
		$plans_id=$_POST["plans_id"];
		if($status!='ACTIVE')
			$status='INACTIVE';
		$result=ac::insert($openingDate, $status, $members_id, $plans_id);
		if($result)
			header("Location: ./viewAccounts.php");
		else
			$error=true;
			echo "$openingDate $status $members_id $plans_id";
			//echo mysqli_error($result);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item"><a href="viewAccounts.php">Accounts</a></li>
		<li class="breadcrumb-item active" aria-current="page">Create New Account</li>
	</ol>
</nav>

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<font size="5px"><b>Create New Account</b></font>
</div>
<center>

<?php
		if($error)
			echo "Something Went Wrong";
        $result=db::query("select * from members");
		$result2=db::query("select * from plans");
?>

<form method="post" action="./createAccount.php">

			<input type="hidden" name="openingDate" value="<?php echo date("Y/m/d") ?>">
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Status</span>
				</div>
				<input type="checkbox" class="form-control" name="status" value="ACTIVE">
			</div>
			
            <div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01">Member</label>
				</div>
				<select class="custom-select" name="members_id">
				<?php
					while($row=mysqli_fetch_assoc($result)){
						echo "<option value=".$row['id'].">".$row['name']."</option>";
					}
				?>
				</select>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01">Plan</label>
				</div>
				<select class="custom-select" name="plans_id">
				<?php
					while($row=mysqli_fetch_assoc($result2)){
						echo "<option value=".$row['id'].">".$row['name']."</option>";
					}
				?>
				</select>
			</div>
			
			<input class="btn btn-block btn-primary" type="submit" name="submit" value="save">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>