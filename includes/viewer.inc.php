<?php
include 'dbh.php';
class Viewer extends Dbh{
    public function view($today,$type,$sql,$measurement,$location){
      
        $result=$this->connect()->query($sql);
        $numRows=$result->num_rows;
        if($numRows >=1){

            
            if($type=='Payment' or $type=='Homework' ){
                while($row=$result->fetch_assoc()){ 

                    echo "
                    
                        <div class='main-content-agile-info'>";
                                                
                            echo "<h3>Due On: ".$row['due_date']."</br>";  
                            echo $type." Number: ".$row['id']."</br>";  
                            echo "<h3>Amount: ".$row['amount'].$measurement."</br>";  
                            echo "<h3>Title: ".$row['title'].'</br>';
                            echo "Content: ".$row['content'].'</br>'; 
                    echo "    </div>  ";


                }
            }else if($type=='Health'){

                while($row=$result->fetch_assoc()){ 
                    $height=$measurement[0];
                    $weight=$measurement[1];
                    $eyesight=$measurement[2];
                    $dentalhealth=$measurement[3];
                    $specialcomments=$measurement[4];
       
                       echo "
                      
                      
                           <div class='main-content-agile-info'>";
                                                      
                               echo $height.$row['height']."cm</br>";
                               echo $weight.$row['weight']."kg</br>";  
                               echo $eyesight.$row['eye_sight']."</br>";  
                               echo $dentalhealth.$row['dental_health'].'</br>';
                               echo $specialcomments.$row['special_comments'].'</br>'; 
                               
       
                           
                       echo "    </div>  ";
       
       
       
                   }
                
            }else if($type=='Progress'){
                $result=$this->connect()->query($sql);              
                $match=$result->fetch_assoc();

                $sinhala=$match['Sinhala'];
                $maths=$match['Maths'];
                $environment=$match['Environment'];
                $games=$match['Games'];
                $handicrafts=$match['Handicrafts'];
                $comments=$match['Comments'];
        
                $progress=array($sinhala,$maths,$environment,$games,$handicrafts,$comments);
                return $progress;
               
        

            }else if($type=='Attendance'){
                $datearray=array();
                $result=$this->connect()->query($sql);
                $tostringdate=$measurement[0];
                $fromstringdate=$measurement[1];
                while($row=$result->fetch_assoc()){
                    $mydate=$row['attendancedate'];
                    $mystringdate=strtotime($mydate);
                   
                    if($today>=$tostringdate ){
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
                        if ($_SESSION["u_type"]==5){
                           header("Location: ../view_c_attendance.php?login=exceededcurrentdate"); 
                        }
                        else{
                            header("Location: ../viewattendance.php?login=exceededcurrentdate");;
                        }
                        
                        exit();
                    }
                }
               
                return $datearray;

            }

        }else{
            header($location);
        }
    }
}


?>