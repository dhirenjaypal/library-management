<?php
	require("./Database.php");
    use dboperations\helper\Members as users;
	use dboperations\helper\Database as db;
	if(isset($_POST["submit"])){
		$id=$_POST["id"];
		$name=$_POST["name"];
		$address=$_POST["address"];
 	    $phone=$_POST["phone"];
		$emailAddress=$_POST["emailAddress"];
 		$isActive=$_POST["isActive"];
		if($isActive!="YES")
			$isActive='NO';
		$result=users::update($id, $name, $address, $phone, $emailAddress, $isActive);
		if($result)
			header("Location: ./viewMembers.php");
		else
			$error=true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Member</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item"><a href="viewMembers.php">Members</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Member</li>
	</ol>
</nav>

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<font size="5px"><b>Update Member</b></font>
</div>
<center>
<?php
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $row=db::selectrow('members',$id);
        }
        else
            $error=true;
		if($error)
			echo "Something Went Wrong";
?>
<form method="post" action="./updateMember.php">

			<input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Member's name" name="name" value="<?php echo $row['name'];?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Address</span>
				</div>
				<input type="text" class="form-control" placeholder="full address" name="address" value="<?php echo $row['address'];?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Phone</span>
				</div>
				<input type="number" class="form-control" placeholder="phone number" name="phone" value="<?php echo $row['phone'];?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Email</span>
				</div>
				<input type="email" class="form-control" placeholder="Email Address" name="emailAddress" value="<?php echo $row['emailAddress'];?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Is active</span>
				</div>
				
				<input type="checkbox" class="form-control" name="isActive" value="YES" <?php if($row['isActive']=='YES') echo "checked"?>>
			</div>
			
			<input class="btn btn-block btn-primary" type="submit" name="submit" value="Update">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>