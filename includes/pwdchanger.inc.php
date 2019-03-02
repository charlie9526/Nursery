<?php

class PwdChanger extends Dbh{
    public function changePwd($person,$uid,$newpwd){
        switch($person){
            case 1: 
                     $sql = "UPDATE childinfo SET user_pwd='$newpwd' WHERE user_uid='$uid' ";
                     $result=$this->connect()->query($sql);
                     
            case 2: 
                     $sql = "UPDATE teacherinfo SET user_pwd='$newpwd' WHERE user_uid='$uid' ";
                     $result=$this->connect()->query($sql);
            case 3: 
                      $sql = "UPDATE financedinfo SET user_pwd='$newpwd' WHERE user_uid='$uid' ";
                     $result=$this->connect()->query($sql);
            case 4: 
                     $sql = "UPDATE healthdinfo SET user_pwd='$newpwd' WHERE user_uid='$uid' ";
                     $result=$this->connect()->query($sql);
            case 5: 
                     $sql = "UPDATE admininfo SET user_pwd='$newpwd' WHERE user_uid='$uid' ";
                     $result=$this->connect()->query($sql);
             

       }
       //changed successfully
       header("Location: ../changepassword.php?login=successfullychanged"); 		     
       exit();
    }



}

?>