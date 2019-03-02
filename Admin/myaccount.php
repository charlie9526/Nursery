<div id="myaccount" class="tab w3-container w3-margin" style="display:none;padding-top:2%">
	<p class="w3-large" style="font-family: georgia;float:left">My Account </p> <p class="w3-small w3-text-gray" style="float:left">content overview</p>
	<div class="w3-panel w3-teal w3-small" style="float:right">
		<?php echo "Today is " . date("Y-m-d");?>
	</div>
	<div class="w3-container">
		<div class="w3-margin w3-center w3-panel w3-blue-gray w3-card-4 w3-medium" onclick="openSubTab('applyleave')" style="float:left;width:20%;height:20%">
	  		<p>Apply Leave                                                                     </p>
		</div>

		<div class="w3-margin w3-center w3-panel w3-teal w3-card-4 w3-medium" onclick="openSubTab('checksalary')" style="float:left;width:20%;height:20%">
	  		<p>Check Salary                                                                    </p>
		</div>

		<div class="w3-margin w3-center w3-text-white w3-panel w3-amber w3-card-4 w3-medium" onclick="openSubTab('myattendance')" style="float:left;width:20%;height:20%">
	  		<p>Attendance                                                                    </p>
		</div>

		<div id="accsettings" class="w3-margin w3-center w3-text-white w3-panel w3-indigo w3-card-4 w3-medium" onclick="openSubTab('accountdetails')" style="float:left;width:20%;height:20%">
	  		<p>Account Settings                                                                    </p>
		</div>
	</div>

	<!--Apply Leave-->
	<div id="applyleave" class="sub1 sub w3-container" style="display:block">
		<div class="w3-container w3-blue-gray">
				<h6>Apply Leave</h6>
		</div>
		<form class="w3-container" style="font-family: georgia;float">
			<br>
			<label>First Name</label>
			<input class="w3-light-gray w3-input" type="text" required>
			<br>

			<label>Last Name</label>
			<input class="w3-light-gray w3-input" type="text" required>
			<br>

			<label>User ID</label>
			<input class="w3-light-gray w3-input" type="text" required>
			<br>

			<label>From</label>
			<input class="w3-light-gray w3-input" id="date" name="fromDate" type="date">

			<br>
			<label>To</label>
			<input class="w3-light-gray w3-input" id="date" name="toDate" type="date">
			<br>
			<label class="w3-text-black"><b>Notes</b></label>
	  		<textarea class="w3-light-gray w3-input" cols="20" rows="8" name="notes" required></textarea>
	  		<br>

	  		<button class="w3-button w3-blue-gray" type="submit">Apply Leave</button>
		</form>
	</div>

	<!--Account details-->
	<div id="accountdetails" class="sub w3-container" style="display:none">
		<div class="w3-container w3-indigo">
				<h6>Account Details</h6>
		</div>
		<div class="w3-container" style="font-family: georgia;float">
			<br>
			<div class="w3-card-4">
				<div class="w3-row-padding">
		  			<div class="w3-half" styel="width:30%">
  						<img src="../images/adam.jpg"  >
  					</div>
  					<div class="w3-half">
  						<div class="w3-container" style="float:left;width:60%">
		    				<?php 
		    					$sql = "SELECT * FROM teacherinfo";
		    					$result = mysqli_query($conn,$sql);
		    					$fields = array("First Name","Last Name","Email","Address","DOB","Telephone","User ID");
		    					if(mysqli_num_rows($result) > 0){
		    						$row = mysqli_fetch_array($result,MYSQLI_NUM);
		    						echo "<header class='w3-container w3-medium w3-indigo'>$row[0] $row[1]</header>";
		    						$i = 0;
		    						while($i<7){
		    							echo "<label style='float:left'><b>$fields[$i]</b></label><label style='float:right'>$row[$i]</label><br><br>";
		    							$i+=1;
		    						}

		    					}
		    				?>
		    			</div>
		    		</div>
  				</div>
  				<div class="w3-container">
  					<header class="w3-container w3-indigo w3-medium" > Edit Account </header>
  					<div id="formChangeAcc" class="w3-container" style="font-family: georgia;float" action="" method="POST"><br>
  						<label>Email</label>
						<input class="w3-light-gray w3-input" type="text" name="email" value="<?php echo $row[2] ?>"required>
						<br>

						<label>Address</label>
						<input class="w3-light-gray w3-input" type="text" name="address" value="<?php echo $row[3] ?>" required>
						<br>

						<label>Telephone</label>
						<input class="w3-light-gray w3-input" type="text" name="tel"  value="<?php echo $row[5] ?>" required>
						<br>

						<button id="changeDetail" class="w3-button w3-indigo" onclick="editAccount()" type="submit">Change Details</button>

  					</div>
  				</div>
  				<br>
  				<div class="w3-container">
  					<header class="w3-container w3-indigo w3-medium" > Change Password </header>
  					<div id="formChangePwd" class="w3-container" style="font-family: georgia;float" action="/" ><br>
  						<label>New Password</label>
						<input id="new_pwd" name="new_pwd" class="w3-light-gray w3-input" type="password" value="" required>
						<br>

						<label>Confirm New Password</label>
						<input id="c_new_pwd" name="c_new_pwd" class="w3-light-gray w3-input" type="password" value="" required>
						<br>

						<label>Current Password</label>
						<input id="cr_pwd" name="cr_pwd" class="w3-light-gray w3-input" type="password" value="" required>
						<br>

						<button id="changePassword"   name="changePwd" class="w3-button w3-indigo" onclick="changePassword()" >Change Password</button>

  					</div>
  					<br>
  					<br>
  				</div>
			</div>
		</div>
	</div>

	<!--Check Salary-->
	<div id="checksalary" class="sub w3-container" style="display:none">
		<div class="w3-container w3-teal">
				<h6>Check Salary</h6>
		</div>
		<form class="w3-container" style="font-family: georgia;float">
			
		</form>
	</div>

	<!--Attendance-->
	<div id="myattendance" class="sub w3-container" style="display:none">
		<div class="w3-container w3-text-white w3-amber">
				<h6>Attendance</h6>
		</div>
		<form class="w3-container" style="font-family: georgia;float">
			
		</form>
	</div>
</div>



