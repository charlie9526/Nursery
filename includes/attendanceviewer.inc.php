<?php
include 'viewer.inc.php';
class AttendanceViewer extends Viewer{
    public function viewAttendance($uid,$person,$fromstringdate,$tostringdate){

        
        $type='Attendance';
        
        if ($_SESSION["u_type"]==5){
            $location='Location:../view_c_attendance.php';   
        }
        else{
            $location='Location:../viewattendance.php';
        }
        

        
        $today=date("Y-m-d");
        $todaystringdate=strtotime($today);
        $today=$todaystringdate;
        if($person==1){
            $sql="SELECT * FROM childattendance WHERE user_uid = '$uid' ";
                      
        }else if($person==2){
            $sql="SELECT * FROM teacherattendance WHERE user_uid = '$uid' ";
          
        }else if($person==3){
            $sql="SELECT * FROM finanacedattendance WHERE user_uid = '$uid' ";
          
        }else if($person==4){
            $sql="SELECT * FROM healthdattendance WHERE user_uid = '$uid' ";
          
        }
        else if($person==5){
            $sql="SELECT * FROM childattendance WHERE user_uid = '$uid' ";
          
        }
        $measurement=array($tostringdate,$fromstringdate);
        $viewer=new Viewer();
        
        $datearray=$viewer->view($today,$type,$sql,$measurement,$location);

/*
        
        while($row=$result->fetch_assoc()){
            $mydate=$row['attendancedate'];
            $mystringdate=strtotime($mydate);
           
            if($todaystringdate>=$tostringdate ){
                if($fromstringdate <= $mystringdate ){   
                     if( $tostringdate >= $mystringdate){   
                        if($row['mark']==1 ){
                            $datearray[]=[$mydate,1];  
                        }else if($row['mark']==0 ){
                            $datearray[]=[$mydate,0]; 
                        }
                                
                    }

                }else {
                    //ignore
                }
            }else{
                header("Location: ../viewattendance.php?login=exceededcurrentdate");
                exit();
            }
        }

        */
       
        return $datearray;
    }
}

?>