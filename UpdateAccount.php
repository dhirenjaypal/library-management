<?php
	require("./Database.php");
    use dboperations\helper\Database as db;
	use dboperations\helper\Accounts as ac;

	if(isset($_POST["submit"])){
		$id=$_POST["id"];
		$openingDate=$_POST["openingDate"];
		$status=$_POST["status"];
 	    $members_id=$_POST["members_id"];
		$plans_id=$_POST["plans_id"];
		if($status!='ACTIVE')
			$status='INACTIVE';
		$result=ac::update($id, $openingDate, $status, $members_id, $plans_id);
		if($result)
			header("Location: ./viewAccounts.php");
		else
			$error=true;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Account</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item"><a href="viewAccounts.php">Accounts</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Account</li>
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
        $result=db::selectall("members");
		$result2=db::selectall("plans");
		
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $data=db::selectrow('accounts',$id);
        }
        else
            $error=true;
		if($error)
			echo "Something Went Wrong";
?>

<form method="post" action="./updateAccount.php">
			<input type="hidden" name="id" value="<?php echo $data['id']?>">
			<input type="hidden" name="openingDate" value="<?php echo $data['openingDate'] ?>">
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Status</span>
				</div>
				<input type="checkbox" class="form-control" name="status" value="ACTIVE" <?php if($data['status']=='ACTIVE') echo "checked"; ?> >
			</div>
			
            <div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01">Member</label>
				</div>
				<select class="custom-select" name="members_id">
				<?php
					while($row=mysqli_fetch_assoc($result)){
						echo "<option value=".$row['id'];
						if($data['members_id']==$row['id'])
							echo " selected";
						echo ">".$row['name']."</option>";
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
						echo "<option value=".$row['id'];
						if($data['plans_id']==$row['id'])
							echo " selected";
						echo " >".$row['name']."</option>";
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