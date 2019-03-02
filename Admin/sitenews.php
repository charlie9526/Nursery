<div id="sitenews" class="tab w3-container w3-margin" style="display:none;padding-top:2%">
	<p class="w3-large" style="font-family: georgia;float:left">Site News </p> <p class="w3-small w3-text-gray" style="float:left">content overview</p>
	<div class="w3-panel w3-teal w3-small" style="float:right">
		<?php echo "Today is " . date("Y-m-d");?>
	</div>
	<div class="w3-container">
		<div class="w3-margin w3-center w3-panel w3-blue-gray w3-card-4 w3-medium" onclick="openSubTab('events')" style="float:left;width:20%;height:20%">
	  		<p>Upcoming Events                                                                    </p>
		</div>

		<div class="w3-margin w3-center w3-panel w3-teal w3-card-4 w3-medium" onclick="openSubTab('memories')" style="float:left;width:20%;height:20%">
	  		<p>Memories On Cam                                                                     </p>
		</div>  

		<div class="w3-margin w3-center w3-panel w3-blue-gray w3-card-4 w3-medium" onclick="openSubTab('addevents')" style="float:left;width:20%;height:20%">
	  		<p>Add Events                                                                    </p>
		</div>

		<div class="w3-margin w3-center w3-panel w3-teal w3-card-4 w3-medium" onclick="openSubTab('addmemory')" style="float:left;width:20%;height:20%">
	  		<p>Add Memorie                                                                    </p>
		</div>                                                                  </p>
	</div>

	<!--Upcoming events-->
	<div id="addevents" class="sub w3-container" style="display:none">
		<div class="w3-container w3-blue-gray">
  			<h6>Add Event</h6>
		</div>
		<div id="addEvent" class="w3-container" style="font-family: georgia;float">
			<br>
			<label>Title</label>
			<input class="w3-light-gray w3-input" type="text" required>
			<br>
			<input class="w3-text-gray w3-center w3-input w3-light-gray " type="date" id="duedate" name="date">
    		<br>
			<label>Content</label>
			<textarea class="w3-input w3-border w3-light-grey" name="content" cols="10" rows="15" required="">
				
			</textarea> 
			<br>
			<button class="w3-button w3-blue-gray"  onclick="addEvent()">Add Event</button>
		</div> 
	</div>


	<!--Memories on cam-->
	<div id="addmemory" class="sub w3-container" style="display:none">
			<div class="w3-container w3-teal">
	  			<h6>Add Memories On Cam</h6>
			</div>
			<form id="addMemory" class="w3-container" style="font-family: georgia;float"  method="post" enctype="multipart/form-data" action="../class/UploadFile.php">
				<br>
				<label>Title</label>
				<input class="w3-light-gray w3-input" name="title" type="text" required>
				<br>
				<label>Description</label>
				<textarea name="memDesc" class="w3-input w3-border w3-light-grey" name="content" cols="10" rows="15" required="">
				
				</textarea> 
				<br>
				<label>Upload Photo</label>
				<input class="w3-input" id="file" type="file" name="fileToUpload" id="fileToUpload">
				<br>
				<button class="w3-button w3-teal" type="submit">Add Memories</button>
			</form>
	</div>

	<!--Upcoming Events-->
	<div id="events" class="sub1  sub w3-container" style="display:block">
			<div class="w3-container w3-blue-gray">
	  			<h6>Upcoming Events</h6>
			</div>
			
			<div class="w3-container"><br>
	    		<?php
	    			
	    			$db = new DB();
	    			$teacher = new Teacher($db->getConnection(),"T1");
	    			$events = $teacher->getEvents();

	    			foreach($events as $id => $data){
	    				echo "<div class='w3-card w3-container' id='event $id' style='float:left:width:30%'>
		    						<header class='w3-padding w3-container w3-medium'> <b>$data[0]</b></header>
		    						<div class='w3-padding w3-container w3-small'>$data[1]</div>
		    						<footer class='w3-padding w3-container w3-medium'> $data[2] 

		    						<button class='w3-button w3-small w3-black' id='$id' onclick='deleteEvent(this)'>Delete</button>

		    						</footer></div><br>";
	    			}
	    		?>
		    </div>
	</div>

	<!--Memories on Cam-->
	<div id="memories" class="sub1  sub w3-container" style="display:block">
			<div class="w3-container w3-teal">
	  			<h6>Memories On Cam</h6>
			</div>
			
	</div>
</div>



<script>

	// define variables
var nativePicker = document.querySelector('.nativeDatePicker');
var fallbackPicker = document.querySelector('.fallbackDatePicker');
var fallbackLabel = document.querySelector('.fallbackLabel');

var yearSelect = document.querySelector('#year');
var monthSelect = document.querySelector('#month');
var daySelect = document.querySelector('#day');

// hide fallback initially
fallbackPicker.style.display = 'none';
fallbackLabel.style.display = 'none';

// test whether a new date input falls back to a text input or not
var test = document.createElement('input');
test.type = 'date';

// if it does, run the code inside the if() {} block
if(test.type === 'text') {
  // hide the native picker and show the fallback
  nativePicker.style.display = 'none';
  fallbackPicker.style.display = 'block';
  fallbackLabel.style.display = 'block';

  // populate the days and years dynamically
  // (the months are always the same, therefore hardcoded)
  populateDays(monthSelect.value);
  populateYears();
}

function populateDays(month) {
  // delete the current set of <option> elements out of the
  // day <select>, ready for the next set to be injected
  while(daySelect.firstChild){
    daySelect.removeChild(daySelect.firstChild);
  }

  // Create variable to hold new number of days to inject
  var dayNum;

  // 31 or 30 days?
  if(month === 'January' || month === 'March' || month === 'May' || month === 'July' || month === 'August' || month === 'October' || month === 'December') {
    dayNum = 31;
  } else if(month === 'April' || month === 'June' || month === 'September' || month === 'November') {
    dayNum = 30;
  } else {
  // If month is February, calculate whether it is a leap year or not
    var year = yearSelect.value;
    (year - 2016) % 4 === 0 ? dayNum = 29 : dayNum = 28;
  }

  // inject the right number of new <option> elements into the day <select>
  for(i = 1; i <= dayNum; i++) {
    var option = document.createElement('option');
    option.textContent = i;
    daySelect.appendChild(option);
  }

  // if previous day has already been set, set daySelect's value
  // to that day, to avoid the day jumping back to 1 when you
  // change the year
  if(previousDay) {
    daySelect.value = previousDay;

    // If the previous day was set to a high number, say 31, and then
    // you chose a month with less total days in it (e.g. February),
    // this part of the code ensures that the highest day available
    // is selected, rather than showing a blank daySelect
    if(daySelect.value === "") {
      daySelect.value = previousDay - 1;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 2;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  // get this year as a number
  var date = new Date();
  var year = date.getFullYear();

  // Make this year, and the 100 years before it available in the year <select>
  for(var i = 0; i <= 100; i++) {
    var option = document.createElement('option');
    option.textContent = year-i;
    yearSelect.appendChild(option);
  }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = function() {
  populateDays(monthSelect.value);
}

monthSelect.onchange = function() {
  populateDays(monthSelect.value);
}

//preserve day selection
var previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = function() {
  previousDay = daySelect.value;
}
</script>

<script type="text/javascript">
	
	function openSubTab(tab_name) {
    		var i;
    		var x = document.getElementsByClassName("sub");
	    	for (i = 0; i < x.length; i++) {
	       		x[i].style.display = "none";  
    		}
    		document.getElementById(tab_name).style.display = "block";  
    		
		}
</script>