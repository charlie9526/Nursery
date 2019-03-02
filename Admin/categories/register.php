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
$x=0;
echo "<form class='w3-container' action='' method='POST'>";
echo "
<button type='submit'  name='clear' value='clear'>Clear last year table</button>";
while($x<30 ){
    echo"

<table>
<tr>
<td><label for='input1'>First name</label></td>
<td><input id='input1' name='f_name$x' type='text'></td>
<td><label for='input2'>Last name</label></td>
<td><input id='input2' name='l_name$x' type='text'></td>
<td><label for='input2'>adress</label></td>
<td><input id='input2' name='adress$x' type='text' ></td>
<td><label for='input2'>Telephone number</label></td>
<td><input id='input2' name='tp$x' type='text'></td>
<td><label for='input2'>email</label></td>
<td><input id='input2' name='email$x' type='text'></td>
<td><label for='input2'>Birthday</label></td>
<td><input id='input2' name='Birthday$x' type='text'></td>
<td><label for='input2'>ID</label></td>
<td><input id='input2' name='ID$x' type='text'></td>
<td><label for='input2'>password</label></td>
<td><input id='input2' name='PW$x' type='text'></td>

</tr>
</table>

";
    $x+=1;
}
echo "
<button type='submit'  name='Submit' value='Submit'>Submit</button></form>";

?>

<?php
    include "includes/dbh.inc.php";

    if(isset($_POST["Submit"])){
        $y=0;
        while($y<30){
            $f_name = $_POST["f_name".$y];
            $l_name = $_POST["l_name".$y];
            $adress = $_POST['adress'.$y];
            $tpn    = $_POST['tp'.$y];
            $email  = $_POST['email'.$y];
            $Birthday=$_POST['Birthday'.$y];
            $id  = $_POST['ID'.$y];
            $password=$_POST['PW'.$y];
            $sql = "INSERT INTO childinfo (user_first,user_last,user_address,user_email,user_dob,user_tp,user_uid,user_pwd) VALUES ('$f_name','$l_name','$adress','$email','$Birthday','$tpn','$id','$password')";
            mysqli_query($conn,$sql);
            $y+=1;
        }
    }
    elseif(isset($_POST['clear'])){
        $sql="TRUNCATE TABLE childinfo";
        mysqli_query($conn,$sql);
    }

    
    ?>
<?php
	include_once 'footer.php';
?>
