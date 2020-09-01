<html>
<head>
	<title>Books</title>
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
		<li class="breadcrumb-item active" aria-current="page">Books</li>
	</ol>
</nav>

<div class="card bg-info rounded-lg">
<div class="card-header bg-primary text-white text-center">
	<h2>List of Books</h>
	<a class="btn btn-info" href='./createBook.php' >Insert New Book</a>
</div>
<?php
if(!class_exists('Database') and !class_exists('Plans'))
	require("./Database.php");
use dboperations\helper\Database as db;
use dboperations\helper\Books as books;

if(isset($_GET["id"])){
	$result=books::delete($_GET["id"]);
	if(!$result)
		echo "Something went wrong";
}
    $result=db::selectall("books");
    echo "<table class='table table-bordered table-responsive table-primary'>";
    echo //"<caption class='text-white'>List of plans</caption>
			"<tr class='bg-primary text-white'>
    		<th>#</th>
    		<th>Name</th>
    		<th>ISBN</th>
    		<th>Author</th>
    		<th>Pricd</th>
    		<th>Pages</th>
    		<th>Publisher</th>
    		<th>Type</th>
    		<th>Published Year</th>
			<th>Quantity</th>
			<th>Edition</th>
			<th>Delete</th>
			<th>Update</th>
    	  </tr>";
     $i=0;
    while($row=mysqli_fetch_assoc($result)){
      $i=$i+1;
    	echo "<tr>
    			<td>".$i."</td>
    			<td>".$row['name']."</td>
    			<td>".$row['isbn']."</td>
    			<td>".$row['authorName']."</td>
    			<td>".$row['price']."</td>
    			<td>".$row['pages']."</td>
    			<td>".$row['publisher']."</td>
				<td>".$row['bookType']."</td>
				<td>".$row['publishedYear']."</td>
				<td>".$row['qty']."</td>
				<td>".$row['edition']."</td>
    			<td><a class='btn btn-danger' href='./viewBooks.php?id=".$row['id']."'>Remove</a></td>
    			<td><a class='btn btn-info' href='./updateBook.php?id=".$row['id']."'>Update</a></td>
    		   </tr>";
    }
    echo "</table>";
?>
</div>


</body>
</html>
