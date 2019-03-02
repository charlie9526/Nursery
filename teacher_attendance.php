<?php
    include "includes/Authorized_admin.php";
    include_once("header.php");
    include_once("includes/Dbh.php");

?>            
            
          
            <div class="button-group">
                    <a href="index.php" class="btn btn-outline-success button-sm">Home</a>
                    <a href="about.php" class="btn btn-outline-success button-sm">About</a>
                    <a href="viewstaff.php" class="btn btn-outline-success button-sm">Our Staff</a>
                    <a href="achievements.php" class="btn btn-outline-success button-sm">Achievements</a>
                    <a href="contact.php" class="btn btn-outline-success button-sm">Contact Us</a>
                    <?php
                            
                            include_once("sessiondecide.php");//session class
                    ?>
                    
            </div>

            
            <div class="content-info" style="top:92px">
                <div class='main-content-agile'>
                    <div class='wthree-pro' style=''>
                        <h2>Mark Attendance</h2>                
                    </div>
                    <div class='sub-main-w3' style='float:left'>   
                        <form action='includes/Attendancee.php' method='POST'>
                            <?php
                                $sql = "SELECT user_first,user_last,user_uid FROM teacherinfo";
                                $db = new Dbh();
                                $connection = $db->connect();
                                $result = $connection->query($sql);
                                echo "<div '><table style='font-size:20px;border-collapse:collapse;border-spacing:0;width:100%;display:table'>";
                                if($result->num_rows>0){
                                    while($row =  mysqli_fetch_array($result,MYSQLI_NUM)){
                                        echo "<tr><td><label style='float:left'>$row[0] $row[1]</label></td><td><input  name='$row[2]' type='checkbox' checked='checked' style='float:right'></td></tr>";
                                        
                                    }
                                }
                                echo "</table></div><br>";
                            ?>
                            <button class='button-login' type='submit' name='getAttendance'>Submit</button>
                        </form>
                    </div>
                    
                </div> 

                <div class='main-content-agile'  style ='float:left;margin-left:10px'>   
                    <div class='wthree-pro'>
                        <h2>Teacher attendance Summary</h2>                
                    </div>    
                    <div class='sub-main-w3' id="attendanceResult" style='float:left'>
                        <script>
                            var d = new Date();
                            var date = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
                            var posting = $.post( "includes/Attendancee.php", { getMark: "true" , date: date } );
                            posting.done(function( data ) {
                            //var content = $( data ).find( "#content" );
                                  $( "#attendanceResult" ).empty().append( data );
                            });
                        </script>
                    </div>    
                </div>
            </div>  

        
 





            <?php
                    
                    include_once("adminstuff background.php");
             ?>
          

                        
            
        
            
        </div>


        <!-- JS -->
        <script src="assets/js/plugins/slick.min.js"></script>
        <script src="assets/js/plugins/animate-headline.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
