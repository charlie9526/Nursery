<?php
include "dbh.php";
include "Redirect.php";

session_start();
class Interview{
 
    // database connection and table name
    private $conn;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function call_interview(){

    	if(isset($_POST["inter_submit"])){
            $date = $_POST["date"];
            $time = $_POST["time"];

            $sql = "INSERT INTO interview (date,time) VALUES ('$date','$time')";

            $res = $this->conn->prepare($sql);
            $res->execute();
            header("Location:../adminstuff.php");
        }
    }
    public function drop_interview(){
    	$sql="TRUNCATE TABLE interview";
        $res = $this->conn->prepare($sql);
        $res->execute();
        header("Location:../adminstuff.php");
    }
}

$db = new Dbh();
$s = new Interview($db->connect());

if(isset($_POST["inter_submit"])){
    
	$s->call_interview();
}
elseif(isset($_POST["drop_submit"])){
	$s->drop_interview();
}

?>