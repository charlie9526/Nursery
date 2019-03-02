<?php

include 'pwdchanger.inc.php';

class PwdChecker extends User{
    public function checkPwd($uid,$currentpwd,$newpwd,$confirmpwd){
        $userdata=$this->getUser($uid);
        $person=$userdata[0];
        $row=$userdata[1];

        if($currentpwd != $row['user_pwd']){
            header("Location: ../changepassword.php?login=incorrectcurrentpwd");
            exit();	
        }elseif ($currentpwd==$row['user_pwd']) {        

           if($newpwd == $confirmpwd){
                $changer=new PwdChanger();
                $changer->changePwd($person,$uid,$newpwd);
           }else{
            header("Location: ../changepassword.php?login=confirmationmismatch");
            exit();	 
           }
        }
    }
}

?>