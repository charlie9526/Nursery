<?php
	include 'includes/sessiondecide.inc.php';	
	if(isset($_SESSION['u_uid'])){	
		$mySession=new Session();
		$mySession->decideSession();

	}				
					
?>