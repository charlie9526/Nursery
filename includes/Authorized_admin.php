<?php
	include 'Redirect.php';
	session_start();
	if(isset($_SESSION["u_type"])){
		if($_SESSION['u_type']!=5){
			Redirect::to("unauthorized");
		}
	}
	else{

		Redirect::to("unauthorized");
	}
	
?>