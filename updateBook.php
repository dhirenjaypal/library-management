<?php
	require("./Database.php");
    use dboperations\helper\Database as db;
    use dboperations\helper\Books as books;
	if(isset($_POST["submit"])){
		$id=$_POST["id"];
		$name=$_POST['name'];
		$isbn=$_POST['isbn'];
		$authorName=$_POST['authorName'];
		$price=$_POST['price'];
		$pages=$_POST['pages'];
		$publisher=$_POST['publisher'];
		$bookType=$_POST['bookType'];
		$publishedYear=$_POST['publishedYear'];
		$qty=$_POST['qty'];
		$edition=$_POST['edition'];

		$result=books::update($id,$name, $isbn, $authorName, $price, $pages, $publisher, $bookType, $publishedYear, $qty, $edition);
		if($result)
			header("Location: ./viewBooks.php");
		else
			$error=true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Book</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item"><a href="viewBooks.php">Books</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Book</li>
	</ol>
</nav>

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<font size="5px"><b>Update Book</b></font>
</div>
<center>
    <?php
        if(isset($_GET["id"]))
            $id=$_GET["id"];
        $row=db::selectrow('books',$id);
		if($error)
			echo "Something Went Wrong";
    ?>
<form method="post" action="./updateBook.php">

			<input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Bookname" name="name" value="<?php echo $row['name']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">ISBN</span>
				</div>
				<input type="number" class="form-control" placeholder="ISBN" name="isbn" value="<?php echo $row['isbn']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Author Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Name" name="authorName" value="<?php echo $row['authorName']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Price</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="price" value="<?php echo $row['price']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">No. of Pages</span>
				</div>
				<input type="number" class="form-control" placeholder="pages" name="pages" value="<?php echo $row['pages']; ?>">
			</div>	
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Publisher</span>
				</div>
				<input type="text" class="form-control" placeholder="Quantity" name="publisher" value="<?php echo $row['publisher']; ?>">
			</div>
			
			<div class="input-group bg-light">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Book Type</span>
				</div>
				<input type="radio" class="form-control ml-5" name="bookType" value='TEXTBOOK' <?php if($row['bookType']=='TEXTBOOK') echo 'checked'; ?>>
				<span class="input-group-text">Textbook</span>
				<input type="radio" class="form-control ml-5" name="bookType" value='MAGAZINE' <?php if($row['bookType']=='MAGAZINE') echo 'checked'; ?>>
				<span class="input-group-text">Magazine</span>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Published Year</span>
				</div>
				<input type="number" class="form-control" placeholder="year" name="publishedYear" value="<?php echo $row['publishedYear']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Quantity</span>
				</div>
				<input type="number" class="form-control" placeholder="quantity" name="qty" value="<?php echo $row['qty']; ?>">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Edition</span>
				</div>
				<input type="text" class="form-control" placeholder="edition" name="edition" value="<?php echo $row['edition']; ?>">
			</div>
			
			<input class="btn btn-block btn-primary" type="submit" name="submit" value="save">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>