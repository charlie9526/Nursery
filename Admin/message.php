<div id="message" class="tab w3-container w3-margin" style="display:none;padding-top:2%">
	<p class="w3-large" style="font-family: georgia;float:left">Message </p> <p class="w3-small w3-text-gray" style="float:left">content overview</p>
	<div class="w3-panel w3-teal w3-small" style="float:right">
		<?php echo "Today is " . date("Y-m-d");?>
	</div>

	<div class="w3-container">
		<div class="w3-margin w3-center w3-panel w3-blue-gray w3-card-4 w3-medium" onclick="openSubTab('applyleave')" style="float:left;width:20%;height:20%">
	  		<p>Messages                                                                     </p>
		</div>

		<div class="w3-margin w3-center w3-panel w3-teal w3-card-4 w3-medium" onclick="openSubTab('checksalary')" style="float:left;width:20%;height:20%">
	  		<p>New Messages                                                                   </p>
		</div>
	</div>
</div>