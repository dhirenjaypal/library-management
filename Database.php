<?php
namespace dboperations\helper;


class Database{
    public static function getConnection(){
        return mysqli_connect("localhost","root","","library");
    }
    public static function query($query){
        return mysqli_query(Database::getConnection(),$query);
    }
	public static function selectrow($table, $id){
        $result=mysqli_query(Database::getConnection(),"select * from $table where id=$id;");
		return mysqli_fetch_assoc($result);
    }
	public static function selectall($table){
        return mysqli_query(Database::getConnection(),"select * from $table;");
    }
}

class Plans{
	public static function insert($name, $daysCount, $maxBooks, $amount, $maxIssueDuration, $penaltyAmount){
        return mysqli_query(Database::getConnection(),"insert into plans (name,daysCount,maxBooks,amount,maxIssueDuration,penalty) values('$name','$daysCount','$maxBooks','$amount','$maxIssueDuration','$penaltyAmount')");
    }
	public static function delete($id){
        return mysqli_query(Database::getConnection(),"delete from plans where id=$id");
    }
	public static function update($id,$name, $daysCount, $maxBooks, $amount, $maxIssueDuration, $penaltyAmount){
        return mysqli_query(Database::getConnection(),"update plans set name='$name',daysCount=$daysCount,maxBooks=$maxBooks,amount=$amount,maxIssueDuration=$maxIssueDuration,penalty=$penaltyAmount where id=$id");
    }
}

class Members{
	public static function insert($name, $address, $phone, $emailAddress, $isActive){
        return mysqli_query(Database::getConnection(),"insert into members (name, address, phone, emailAddress, isActive) values('$name','$address','$phone','$emailAddress','$isActive')");
    }
	public static function delete($id){
        return mysqli_query(Database::getConnection(),"delete from members where id=$id");
    }
	public static function update($id, $name, $address, $phone, $emailAddress, $isActive){
        return mysqli_query(Database::getConnection(),"update members set name='$name', address='$address', phone=$phone, emailAddress='$emailAddress', isActive='$isActive' where id=$id");
    }
}

class Accounts{
	public static function insert($openingDate, $status, $members_id, $plans_id){
        return mysqli_query(Database::getConnection(),"insert into accounts (openingDate, status, members_id, plans_id) value( '$openingDate', '$status', $members_id, $plans_id )");
    }
	public static function delete($id){
        return mysqli_query(Database::getConnection(),"delete from accounts where id=$id");
    }
	public static function update($id, $openingDate, $status, $members_id, $plans_id){
        return mysqli_query(Database::getConnection(),"update accounts set openingDate='$openingDate', status='$status', members_id=$members_id, plans_id=$plans_id where id=$id");
    }
}

class Books{
	public static function insert($name, $isbn, $authorName, $price, $pages, $publisher, $bookType, $publishedYear, $qty, $edition){
        return mysqli_query(Database::getConnection(),"insert into books(name, isbn, authorName, price, pages, publisher, bookType, publishedYear, qty, edition) value('$name', $isbn, '$authorName', $price, $pages, '$publisher', '$bookType', $publishedYear, $qty, '$edition')");
    }
	public static function delete($id){
        return mysqli_query(Database::getConnection(),"delete from __ where id=$id");
    }
	public static function update($id){
        return mysqli_query(Database::getConnection(),"update __ where id=$id");
    }
}

//test
/*
$test=Books::insert('Learning Web Design', 1491960205, 'Jennifer Niederst Robbins', 500, 808, "O\'Reilly Media", 'TEXTBOOK', 2018, 4, '5th Edition');
//working//
//$test=mysqli_query(Database::getConnection(), "insert into books(name, isbn, authorName, price, pages, publisher, bookType, publishedYear, qty, edition) value('Learning Web Design', 1491960205, 'Jennifer Niederst Robbins', 500, 808, 'OReilly Media', 'TEXTBOOK', 2018, 4, '5th Edition')");
if($test)
	echo "done";
else
	echo "error";
*/
//









//


?>
