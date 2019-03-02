<?php

class ViewPwdChange extends User{
    public function changePassword($uid,$currentpwd,$newpwd,$confirmpwd){
        $userdata=$this->getUser($uid);
        $person=$userdata[0];
        $row=$userdata[1];

        if($currentpwd != $row['user_pwd']){
            header("Location: ../changepassword.php?login=incorrectcurrentpwd");
            exit();	
        }elseif ($currentpwd==$row['user_pwd']) {
           if($newpwd == $confirmpwd){

           }else{
            header("Location: ../changepassword.php?login=confirmationmismatch");
            exit();	 
           }
        }
    }
}

?>