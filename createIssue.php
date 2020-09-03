<?php
	require_once("./Database.php");
	use dboperations\helper\Database as db;
    use dboperations\helper\Issues as issues;

	if(isset($_POST["submit"])){
		$dateOfIssue=$_POST["dateOfIssue"];
		$status=$_POST["status"];
		$accounts_id=$_POST["accounts_id"];
		$books_id=$_POST["books_id"];
		if($status!='ACTIVE')
			$status='INACTIVE';
		$result=issues::insert($dateOfIssue, $status, $accounts_id, $books_id);
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
		<li class="breadcrumb-item active" aria-current="page">Issue Book</li>
	</ol>
</nav>

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<font size="5px"><b>Issue book</b></font>
</div>
<center>
<?php
    $acs=db::selectall("accounts");
	$books=db::selectall("books");
	if($error)
		echo "<font style='color: white'>Something went wrong</font>";
?>
<form method="post" action="./createIssue.php">

            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Date</span>
				</div>
				<input type="date" class="form-control" name="dateOfIssue" value="<?php echo date("Y-m-d"); ?>">
			</div>
			
			<div class="input-group bg-light">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Status: Active</span>
				</div>
				<input type="checkbox" class="form-control" name="status" value='ACTIVE'>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Account</span>
				</div>
				<select class="form-control" name="accounts_id">
				<?php
					while($row=mysqli_fetch_assoc($acs)){
						$member=db::selectrow("members",$row['members_id']);
						$plan=db::selectrow("plans",$row['plans_id']);
						echo "<option value=".$row['id'].">".$member['name']," : ".$plan['name']."</option>";
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
					while($row=mysqli_fetch_assoc($books)){
						echo "<option value=".$row['id'].">".$row['name']," by ".$row['authorName']."</option>";
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