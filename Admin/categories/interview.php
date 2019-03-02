<?php

	include_once('header.php');
?>
	<section class="main-container">
		<div class="main-wrapper">
			
			<?php				
				if(isset($_SESSION['u_id'])){
					echo "You are logged in!" ;					
				}
			?>
		</div>
	</section>

<?php
    include "includes/dbh.inc.php";

    if(isset($_POST['date']) && isset($_POST['time']) && isset($_POST["submit"])){
        $date = $_POST['date'];
        $time = $_POST['time'];
        $sql = "INSERT INTO interview (Date_time) VALUES ('$date"." ".$time."')";
        $result = mysqli_query($conn,$sql);
    }
    elseif(isset($_POST["cancel"])){
        $sql="SELECT ID FROM interview";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_NUM);
        $id = $row[0];
        
        $sql2  = "DELETE FROM interview WHERE ID = '$id'";
        $result = mysqli_query($conn,$sql2);
    }
    
    ?>
 <form class="w3-container" action="" style="width:40%" method="POST">

     <label class="w3-text-blue" >Date</label>
     <input class="w3-input" name= "date" type="text">

     <label class="w3-text-blue" >Time</label>
     <input class="w3-input"  name="time" type="text">
     <br>
     <button class="w3-btn w3-blue" type="submit" value="submit" name="submit">Submit</button>
     <button class="w3-btn w3-blue" type="submit" name="cancel" value="cancel">Cancel</button>
</form> 
<?php
	include_once 'footer.php';
?>