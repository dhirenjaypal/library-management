<?php
namespace dboperations\helper;


class Database{
    public static function getConnection(){
        return mysqli_connect("localhost","root","","library");
    }
    public static function query($query){
        return mysqli_query(Database::getConnection(),$query);
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

?>
