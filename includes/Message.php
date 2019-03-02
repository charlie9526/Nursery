<?php
	include "Dbh.inc.php";
	include "Redirect.php";
	session_start();
	class Message extends Dbh{

		public function sendMessage($data){
			$sql = "INSERT INTO message (sender_id	,receiver_id	,content,	date
) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";

			$result=$this->connect()->query($sql);
            
            if($result){
            	return true;
            } else {
            	return false;
            }
		}

		

		public function getContacts(){
			$sql = "SELECT user_uid,user_first,user_last FROM childinfo";
			$result=$this->connect()->query($sql);
            
            if($result){
            	if ($result->num_rows>0){
	            	while($row = $result->fetch_array(MYSQLI_NUM)){
	        			echo "<option value='$row[0]'>".$row[1]." ".$row[1]."</option>";
	        		}
	        	}
            } else {
            	echo "Unexpected Error!";
            }

		}

		public function getMessages(){
			$id = $_SESSION['u_uid'];

			$sql = "SELECT 	msg_id,sender_id,receiver_id,date,content FROM message WHERE sender_id = '$id'";
			
			$result = $this->connect()->query($sql);
			$sendMessages = array();
			if($result){
            	if ($result->num_rows>0){
            		$i=0;
	            	while($row = $result->fetch_array(MYSQLI_NUM)){
	        			$sendMessages["send"][] = array($row[2],$row[3],$row[4]);
	        			$i++;
	        		}
	        		echo json_encode($sendMessages);
	        	} else {
	        		echo "NO Messages!";
	        	}
            } else {
            	echo "Unexpected Error!";
            }

		}
	}


	$msg = new Message();

	if(isset($_POST['sendMessage'])){
		$data = array($_SESSION['u_uid'],$_POST['Receiver'],$_POST['Message'],date('y-m-d'));
		echo $msg->sendMessage($data);
		Redirect::to("message");
	} else if (isset($_POST['getContact'])){
		$msg->getContacts();
	} else if(isset($_POST['getMessages'])){
		$msg->getMessages();
	}
	
?>