<?php

	include_once('header.php');
	
?>



<div class='content'>
	
	<div class='main-content-agile'>
		<div class='wthree-pro'>
			<h2>Change password</h2>				
		</div>
		<div class='sub-main-w3'>	
			<form action='includes/pwdchange.inc.php' method='POST'>
				<input type="text" name="uid" placeholder="Username/E-mail">
				<input type="password" name="currentpwd" placeholder="Current password">
				<input type="password" name="newpwd" placeholder="New password">
				<input type="password" name="confirmpwd" placeholder="Confirm the new password">	
				<input type="submit" name="submit" >
			</form>
		</div>
	</div>
</div>