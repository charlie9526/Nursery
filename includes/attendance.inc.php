<?php
session_start();


if(isset($_POST['check'])){
    $sql = "SELECT * FROM childinfo WHERE user_uid = '".$_POST['uid']."'";

    $db = new Dbh();
    $connection = $db->connect();
    $result = $connection->query($sql);

    
    if($result->num_rows>0){
        echo "OK";
    }
}


if(isset($_POST['submit'])) {
	
    include 'attendanceviewer.inc.php' ;

    $sql = "SELECT * FROM childinfo WHERE user_uid = '".$_POST['uid']."'";

    $db = new Dbh();
    $connection = $db->connect();
    $result = $connection->query($sql);

    
    if($result->num_rows>0){
        $_SESSION["chechbit"] = 1;
    }
    
	$fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    
	$fromstringdate=strtotime($fromdate);
    $tostringdate=strtotime($todate);

    
    if($_SESSION["u_type"]==5){
        $uid=$_POST['uid'];
    }
    else{
        $uid= $_SESSION['u_uid'] ;    
    }

    $person=$_SESSION['u_type'] ;

    
	if(empty($fromdate) || empty($todate)){
        if ($_SESSION["u_type"]==5){
            header("Location: ../view_c_attendance.php?login=empty"); 	
        }
        else{
            header("Location: ../viewattendance.php?login=empty");
        }
        	     
		exit();
	}else if($fromstringdate > $tostringdate){
        if ($_SESSION["u_type"]==5){
            header("Location: ../view_c_attendance.php?login=empty");   
        }
        else{
            header("Location: ../viewattendance.php?login=empty");
        }	     
        exit();
    }else if($fromstringdate <= $tostringdate){
        $attendanceviewer=new AttendanceViewer();
        $attendancearray=$attendanceviewer->viewAttendance($uid,$person,$fromstringdate,$tostringdate);
        echo '<h1>Date    Attendance</h1> ';
     
        foreach($attendancearray as $attendance){
            if($attendance[1]==1){
                echo $attendance[0];
                echo '<img src="../assets/images/tick.jpg" width="50px" height="50px" />'.'</br>';
            }else if($attendance[1]==0){
                echo $attendance[0];
                echo '<img src="../assets/images/cross.png" width="50px" height="50px" />'.'</br>';
            }
        }
       
	}
}

?>


<body style="background-image:url('../assets/images/index-slider1.jpg')">