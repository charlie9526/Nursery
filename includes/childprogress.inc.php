<?php




include 'dbh.inc.php' ;
$uid= $_SESSION['u_uid'] ;
$sql="SELECT * FROM childprogress WHERE user_uid = '$uid' ";

$result=mysqli_query($conn , $sql );

if($result !== false and mysqli_num_rows($result) >0){
	if($row = mysqli_fetch_assoc($result)){

		$environment= $row['Environment'];
		$swimming= $row['Swimming'];
		$handicrafts= $row['Handicrafts'];
		$mathematics= $row['Mathematics'];
		$interactualBehaviour= $row['Interactual Behaviour'];

	}
}