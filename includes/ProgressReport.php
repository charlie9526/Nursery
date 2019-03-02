<?php
	
	include "dbh.inc.php";
	include "redirect.php";

	class Progressreport extends Dbh {

		public function getNames($name){
			$sql = "SELECT user_uid, user_first,user_last FROM childinfo WHERE user_first LIKE '%$name%' OR user_last LIKE '%$name%'";
			$result=$this->connect()->query($sql);

			if($result){
            	if ($result->num_rows>0){
            		
	            	while($row = $result->fetch_array(MYSQLI_NUM)){
	        			echo "<option value='$row[1] $row[2]' id='$row[0]'>";
	        		}
	        		
	        	}
            } else {
            	echo "No Matched Records!";
            }
		}

		public function getReport($id){
			$sql = "SELECT * FROM childprogresss WHERE user_uid = '$id'";
			$result=$this->connect()->query($sql);

			if($result){
            	if ($result->num_rows>0){
            		$data = array();
	            	while($row = $result->fetch_array(MYSQLI_NUM)){
	        			$data = array("0"=>$row[1],"1"=>$row[2],"2"=>$row[3],"3"=>$row[4],"4"=>$row[5],"5"=>$row[0],"6"=>$row[6]);
	        		}
	        		echo json_encode($data);
	        	}
            } else {
            	echo "No Matched Records!";
            }
		}

		public function getID($user_first,$user_last){
			$sql = "SELECT user_uid FROM childinfo WHERE user_first = '$user_first' AND user_last = '$user_last'";
			$result=$this->connect()->query($sql);
			if($result){
            	if ($result->num_rows>0){
            		while($row = $result->fetch_array(MYSQLI_NUM)){
	        			echo $row[0];
	        		}
            	}
            }
		}

		public function submitReport($data){
			$sql = "INSERT INTO childprogresss (user_uid,Sinhala,Maths,Environment,Games,Handicrafts,Comments) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
			$result=$this->connect()->query($sql);
			if($result){
            	echo "ok";
            } else{
            	$sql = "UPDATE childprogresss SET Sinhala='$data[1]',Maths='$data[2]',Environment='$data[3]',Games='$data[4]',Handicrafts='$data[5]',Comments='$data[6]' WHERE user_uid = '$data[0]'";
            	echo $sql;
            	$result=$this->connect()->query($sql);
				if($result){
            		echo "Updated";
            	} else {
            		echo "Unexpected Error!".$sql;
            	}
            }

		}
	}

	$report = new Progressreport();

	if(isset($_POST['stdName'])){
		$report->getNames($_POST['stdName']);
	} else if(isset($_POST['stdId'])){
		$report->getReport($_POST['stdId']);
	} else if(isset($_POST['getId'])){
		$user_last = $_POST['user_last'];
		$user_first = $_POST['user_first'];
		$report->getID($user_first,$user_last);
	} else if(isset($_POST['submitReport'])){
		$data = array($_POST['user_uid'],$_POST['sinhala'],$_POST['math'],$_POST['environment'],$_POST['game'],$_POST['handicraft'],$_POST['comments']);
		$report->submitReport($data);
	}
	
?>