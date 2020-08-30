<?php
namespace dboperations\helper;


class Database{
    public static function getConnection(){
        return mysqli_connect("localhost","root","","library");
    }
    public static function query($query){
        return mysqli_query(Database::getConnection(),$query);
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

?>
