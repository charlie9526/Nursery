<?php
//handle all data and give it to user 
class ViewUser extends User{
	public function showUser($uid,$pwd){
        $userdata=$this->getUser($uid);
        $person=$userdata[0];
        $row=$userdata[1];
        
            
        if($pwd != $row['user_pwd']){
                header("Location: ../login.php?login=pwdmismatch");
                exit();	
        }elseif ($pwd==$row['user_pwd']) {
                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_first'] = $row['user_first'];
                $_SESSION['u_last'] = $row['user_last'];
                $_SESSION['u_email'] = $row['user_email'];
                $_SESSION['u_address'] = $row['user_address'];
                $_SESSION['u_dob'] = $row['user_dob'];
                $_SESSION['u_tp'] = $row['user_tp'];
                $_SESSION['u_uid'] = $row['user_uid'];
                $_SESSION['u_pwd'] = $row['user_pwd'];

                if($person==1){
                    $_SESSION['u_type'] = 1;
                    header("Location: ../childstuff.php?login=childstuff");            
                    exit();	
                }elseif ($person==2) {
                    $_SESSION['u_type'] = 2;
                    header("Location: ../teacherstuff.php?login=teacherstuff");
                    exit();
                }elseif ($person==3) {
                    $_SESSION['u_type'] = 3;
                    header("Location: ../financedstuff.php?login=financedstuff");
                    exit();
                }elseif ($person==4) {
                    $_SESSION['u_type'] = 4;
                    header("Location: ../healthdstuff.php?login=healthdstuff");
                    exit();
                }elseif($person==5){
                    $_SESSION['u_type'] = 5;
                    header("Location: ../adminstuff.php?login=adminstuff");
                }
                

        }

    }

}


 ?>