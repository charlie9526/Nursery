<?php
session_start();

if(isset($_POST['submit'])) {
	include 'dbh.inc.php';
	include 'user.inc.php';
	include 'pwdchecker.inc.php';
	
	$uid=$_POST['uid'];
	$currentpwd=$_POST['currentpwd'];
	$newpwd=$_POST['newpwd'];
	$confirmpwd=$_POST['confirmpwd'];


	if(empty($uid) || empty($currentpwd)||empty($newpwd)||empty($confirmpwd)){
		header("Location: ../changepassword.php?login=empty"); 		     
		exit();
	}else{

		$user=new PwdChecker();
		$user->checkPwd($uid,$currentpwd,$newpwd,$confirmpwd);


		
	}
}

	

?>