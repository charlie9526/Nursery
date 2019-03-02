<?php
session_start();

if(isset($_POST['submit'])){ 
	include 'dbh.inc.php';
	include 'user.inc.php';
	include 'viewuser.inc.php';  
	$uid=$_POST['uid'];
	$pwd=$_POST['pwd'];  
	
	if(empty($uid) || empty($pwd)){    
		header("Location: ../login.php?login=empty");                      
		exit();
	}else{
		$user=new ViewUser();
		$user->showUser($uid,$pwd);
	}
	

}else{
	header("Location: ../index.php");
	exit();
}



?>