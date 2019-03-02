<div id="myclass" class="tab w3-container w3-margin " style="display:block;padding-top:2%">
	<p class="w3-large" style="font-family: georgia;float:left">My Institute </p> <p class="w3-small w3-text-gray" style="float:left">content overview</p>
	<div class="w3-panel w3-teal w3-small" style="float:right">
		<?php echo "Today is " . date("Y-m-d");?>
	</div>
	<div class="w3-container">
		<div class="w3-margin w3-center w3-panel w3-blue w3-card-4 w3-medium" onclick="openSubTab('children_attendance')" style="float:left;width:20%;height:20%">
	  		<p>Children's Attendance                                                                    </p>
		</div>

		<div class="w3-margin w3-center w3-panel w3-red w3-card-4 w3-medium" onclick="openSubTab('attendance')" style="float:left;width:20%;height:20%">
	  		<p>Teachers' Attendance                                                                     </p>
		</div>

		<div class="w3-margin w3-center w3-text-white w3-panel w3-indigo w3-card-4 w3-medium" onclick="openSubTab('children')" style="float:left;width:20%;height:20%">
	  		<p>Children                                                                    </p>
		</div>
        
        <div class="w3-margin w3-center w3-text-white w3-panel w3-indigo w3-card-4 w3-medium" onclick="openSubTab('teacher')" style="float:left;width:20%;height:20%">
	  		<p>Teachers                                                                    </p>
		</div>


	</div>
    
    <!--Children's Attendance-->
	<div id="children_attendance" class="sub w3-container" style="display:block">
		<div class="w3-container w3-teal">
				<h6>Children's Attendance</h6>
		</div><br>
	

		<div class="w3-container"  style="float:left;width:60%">

			<div class="w3-container  w3-padding" >
				<div class="w3-container ">
					<header class="w3-center w3-teal w3-container w3-padding">Daily Class Summary</header><br>
					<label class="w3-text-gray">Present<br></label>
					<label class="w3-text-gray">Absent<br></label>
					<label class="w3-text-gray">Total</label>
				</div>
				<br>
				<div class="w3-container " style="" >
					<header class="w3-center w3-teal w3-container w3-padding">View Report</header>

					<input class="w3-text-gray w3-center w3-input w3-light-gray " type="date" id="day" name="day">
					<br>
					<button class="w3-button w3-teal">Get</button>
				</div>
				<br>
				
			</div><br>
		</div>

	</div>

	

	<!--Teachers' attendance-->
	<div id="attendance" class="sub w3-container" style="display:none">
		<div class="w3-container w3-teal">
				<h6>Teachers' attendance</h6>
		</div><br>
		<form id="attendanceForm" action="/"  style="width:40%;float:left;font-family: georgia;float" method="POST" >
			<?php 
				echo "<table style='' class='w3-table-all'><tr class='w3-teal'>
 						 <th>Teacher</th>
  						 <th >".date("Y-m-d")."</th>
  						 </tr>";
  				$sql = "SELECT * FROM teacherinfo ";
				$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
						echo "<tr class='w3-small w3-hover-black'>";
						echo "<td>$row[0] $row[1]</td>";
						echo "<td><label>Present</label><input class='w3-check' name='$row[6]' type='checkbox' checked='checked'></td>";
						echo "</tr>";
					}
				}
  				echo "</table>";
			?>
			<br>
			<input id="submitAttendance"  type="submit" class="w3-button w3-teal" >
			<!--<input type="submit" id="mark_attendance" value="Submit" class="w3-input w3-teal">-->
		</form>

		<div class="w3-container"  style="float:left;width:60%">

			<div class="w3-container  w3-padding" >
				<div class="w3-container ">
					<header class="w3-center w3-teal w3-container w3-padding">Daily Teacher Attendancy Summary</header><br>
					<label class="w3-text-gray">Present<br></label>
					<label class="w3-text-gray">Absent<br></label>
					<label class="w3-text-gray">Total</label>
				</div>
				<br>
				<div class="w3-container " style="" >
					<header class="w3-center w3-teal w3-container w3-padding">View Report</header>

					<input class="w3-text-gray w3-center w3-input w3-light-gray " type="date" id="day" name="day">
					<br>
					<button class="w3-button w3-teal">Get</button>
				</div>
				<br>
				
			</div><br>
		</div>

	</div>


	<!--Children-->
	<div id="children" class="sub w3-container" style="display:none">
		<div class="w3-container w3-text-white w3-indigo">
				<h6>Children</h6>
		</div>
		<div class="w3-container">
			
			<?php
				$sql = "SELECT * FROM childinfo ";
				$result = mysqli_query($conn,$sql);
				echo "<table class='w3-table-all'><tr class='w3-indigo'>
 						 <th>First Name</th>
  						 <th>Last Name</th>
  						 <th>Address</th>
  						 <th>Email</th>
  						 <th>DOB</th>
  						 <th>Telephone</th>
  						 <th>User ID</th>
					</tr>";
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
						echo "<tr class='w3-small w3-hover-black'>";
						$i = 0;
						while($i < 7){
							echo "<td>$row[$i]</td>";
							$i+=1;
						}
						echo "</tr>";
					}
				}
				echo "</table>"
			?>
		</div>
	</div>
    
    <!--Teacher-->
	<div id="teacher" class="sub w3-container" style="display:none">
		<div class="w3-container w3-text-white w3-indigo">
				<h6>Teachers</h6>
		</div>
		<div class="w3-container">
			
			<?php
				$sql = "SELECT * FROM teacherinfo ";
				$result = mysqli_query($conn,$sql);
				echo "<table class='w3-table-all'><tr class='w3-indigo'>
 						 <th>First Name</th>
  						 <th>Last Name</th>
  						 <th>Address</th>
  						 <th>Email</th>
  						 <th>DOB</th>
  						 <th>Telephone</th>
  						 <th>User ID</th>
					</tr>";
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
						echo "<tr class='w3-small w3-hover-black'>";
						$i = 0;
						while($i < 7){
							echo "<td>$row[$i]</td>";
							$i+=1;
						}
						echo "</tr>";
					}
				}
				echo "</table>"
			?>
		</div>
	</div>

<script>
$( "#searchForm" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 
  // Get some values from elements on the page:
  var $form = $( this ),
    term = $form.find( "input[name='s']" ).val(),
    url = $form.attr( "action" );
 
  // Send the data using post
  var posting = $.post( url, { s: term } );
 
  // Put the results in a div
  posting.done(function( data ) {
    var content = $( data ).find( "#content" );
    $( "#result" ).empty().append( content );
  });
});
</script>
 
</div>
