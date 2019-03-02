<?php 
//one class which handles all connections.
class User extends Dbh{
    //connect to database and get all data
     
	protected function getUser($uid){
      
        
            $sql="SELECT * FROM childinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
            $result=$this->connect()->query($sql);
            $numRows=$result->num_rows;
            if($numRows<1){//not a child
                $sql="SELECT * FROM teacherinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
                $result=$this->connect()->query($sql);
                $numRows=$result->num_rows;
                if($numRows<1){//not even a teacher
                    $sql="SELECT * FROM financedinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
                    $result=$this->connect()->query($sql);
                    $numRows=$result->num_rows;
                    if($numRows<1){//not even a finance person
                        $sql="SELECT * FROM healthdinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
                        $result=$this->connect()->query($sql);
                        $numRows=$result->num_rows;
                        if($numRows<1){//not even a health-d person
                            $sql="SELECT * FROM admininfo WHERE user_uid = '$uid' OR user_email='$uid' ";
                            $result=$this->connect()->query($sql);
                            $numRows=$result->num_rows;
                            if($numRows<1){//not even an admin person
                                header("Location: ../index.php?login=uidmismatch");
                                exit();
                            }else{
                                $person=5;
                            }
                        }else{
                            $person=4;
                        }
                    }else{
                        $person=3;
                    }
                }else{
                    $person=2;
                }
            }else{
                $person=1;
            }
            $match=$result->fetch_assoc();
            $userdata=array($person,$match);
            return $userdata;
            
    }
}