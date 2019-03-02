<?php
	include "DB.php";

    class Admin{
        
        private $user_uid;
		private $user_pwd;
		private $conn;
        
        public function __construct($db,$u_id){
			$this->user_uid = $u_id;
			$this->conn = $db;
		}
        
        public function changePassword($data){
			$data = json_decode($data,false);
			$sql = "SELECT user_pwd FROM admininfo WHERE user_uid = '" . $this->user_uid."'";

			$res = $this->conn->prepare($sql);
			$res->execute();

			$result = $res->get_result();

			$row = $result->fetch_array(MYSQLI_NUM);
			$current_pwd = $row[0];

			if($data->current_pwd == $current_pwd){
				$sql = "UPDATE admininfo SET user_pwd = '".$data->new_pwd. "' WHERE user_uid = '".$this->user_uid."'";

				$res = $this->conn->prepare($sql);
				$res->execute();
				return true;
			} else{
				return false;
			}

		}
        
        public function register_child($data){
            $data = json_decode($data,false);
            $f_name = $data->f_name;
            $l_name = $data->l_name;
            $adress = $data->adress;
            $tpn    = $data->tpn;
            $email  = $data->email;
            $Birthday=$data->Birthday;
            $id  = $data->id;
            $password=$data->password;
            
            $sql = "INSERT INTO childinfo (user_first,user_last,user_address,user_email,user_dob,user_tp,user_uid,user_pwd) VALUES ('$f_name','$l_name','$adress','$email','$Birthday','$tpn','$id','$password')";
            
            $res = $this->conn->prepare($sql);
            $res->execute();
        }
        
        public function remove_child($data){
            $data = json_decode($data,false);
            $sql = "DELETE FROM child_info WHERE user_uid = $data ";
            $res = $this->conn->prepare($sql);
            $res->execute();
            
        }
        
        public function clear_table(){
            sql="TRUNCATE TABLE childinfo";
            $res = $this->conn->prepare($sql);
            $res->execute();
        }
        
        public function approve_leave($uid){
            $sql = "UPDATE leaveapplications SET state='approved' WHERE leave_id='$uid'";
            $$res = $this->conn->prepare($sql);
            $res->execute();
        }
        
        public function cancel_leave($uid){
            $sql = "UPDATE leaveapplications SET state='cancel' WHERE leave_id='$uid'";
            $res = $this->conn->prepare($sql);
            $res->execute();
        }
        
        
        
    }