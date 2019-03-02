<?php
include "Dbh.php";
include "Redirect.php";

class Attendance{
 
    // database connection and table name
    private $conn;
    private $table_name = "attendance";
 
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function markAttendance(){
        $date = date("Y-m-d");
        $sqlDelete = "DELETE FROM `attendance` WHERE attendancedate = '$date'";
        $res = $this->conn->prepare($sqlDelete);
        $res->execute();

    	$sql = "SELECT user_uid FROM teacherinfo";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $arr = $res->get_result();
        $users = array();
        while($row = $arr->fetch_array(MYSQLI_NUM)){
        	$users[] = $row[0];
        }
        
        

        foreach($users as $user){
            if(isset($_POST[$user])){
                $sql = "INSERT INTO attendance (student_id,attendancedate,mark) VALUES ('".$user."','$date','1')";
                
            } else {
                $sql = "INSERT INTO attendance (student_id,attendancedate,mark) VALUES ('".$user."','$date',0)";
            }
            $res = $this->conn->prepare($sql);
            $res->execute();
        }
    }

    public function getAttendanceReport($date){
        $sql = "SELECT COUNT(mark) FROM attendance WHERE attendancedate = '$date' AND mark='1'";
        $sql2 = "SELECT COUNT(mark) FROM attendance WHERE attendancedate = '$date' AND mark='0'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $present = $res->get_result()->fetch_array(MYSQLI_NUM); 
        $res = $this->conn->prepare($sql2);
        $res->execute();
        $absent = $res->get_result()->fetch_array(MYSQLI_NUM); 
        echo "<h3>".date("Y-m-d")."</h3>";
        echo "<table style='font-size:20px;border-collapse:collapse;border-spacing:0;width:100%;display:table'>";
        echo "<tr><td class='float:right'>Present Students </td><td class='float:left'>$present[0]</td></tr>";
        echo "<tr><td class='float:right'>Absent Students </td><td class='float:left'>$absent[0]</td></tr>";
        echo "<tr><td class='float:right'>Total  Students </td><td class='float:left'>".($present[0] + $absent[0])."</td></tr>";
        echo "</table>";
    }
}

$db = new Dbh();
$s = new Attendance($db->connect());


if(isset($_POST['getAttendance'])){
    $s->markAttendance();
    Redirect::to("markAttendance","Attendance marked!");
} else if(isset($_POST['getMark'])){
    $s->getAttendanceReport($_POST['date']);
}
?>