<?php
	require_once("./Database.php");
	use dboperations\helper\Database as db;
    use dboperations\helper\Issues as issues;

	if(isset($_POST["submit"])){
		$id=$_POST['id'];
		$dateOfIssue=$_POST["dateOfIssue"];
		$status=$_POST["status"];
		$accounts_id=$_POST["accounts_id"];
		$books_id=$_POST["books_id"];
		if($status!='ACTIVE')
			$status='INACTIVE';
		$result=issues::update($id,$dateOfIssue, $status, $accounts_id, $books_id);
		if($result)
			header("Location: ./viewIssues.php");
		else
			$error=true;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item"><a href="viewIssues.php">Issues</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Issue</li>
	</ol>
</nav>

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<font size="5px"><b>Update Issue</b></font>
</div>
<center>
<?php
    $acs=db::selectall("accounts");
	$books=db::selectall("books");
	if($_GET['id'])
		$id=$_GET['id'];
	$row=db::selectrow('issues',$id);
	if(!$row)
		$error=true;
	if($error)
		echo "<font style='color: white'>Something went wrong</font>";
?>
<form method="post" action="./updateIssue.php">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Date</span>
				</div>
				<input type="date" class="form-control" name="dateOfIssue" value="<?php echo $row['dateOfIssue'] ?>">
			</div>
			
			<div class="input-group bg-light">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Status: Active</span>
				</div>
				<input type="checkbox" class="form-control" name="status" value='ACTIVE' <?php if($row['status']=='ACTIVE') echo 'checked'; ?>>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Account</span>
				</div>
				<select class="form-control" name="accounts_id" value="<?php echo $row['accounts_id']; ?>">
				<?php
					while($ac=mysqli_fetch_assoc($acs)){
						$member=db::selectrow("members",$ac['members_id']);
						$plan=db::selectrow("plans",$ac['plans_id']);
						echo "<option value=".$ac['id']." ";
						if($row['accounts_id']==$ac['id'])
							echo "selected";
						echo ">".$member['name']," : ".$plan['name']."</option>";
					}
				?>
				</select>
			</div>

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Book</span>
				</div>
				<select class="form-control" name="books_id">
				<?php
					while($book=mysqli_fetch_assoc($books)){
						echo "<option value=".$book['id']." ";
						if($book['id']==$row['books_id'])
							echo "selected";
						echo ">".$book['name']," by ".$book['authorName']."</option>";
					}
				?>
				</select>
			</div>

			<input class="btn btn-block btn-primary" type="submit" name="submit" value="update">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>