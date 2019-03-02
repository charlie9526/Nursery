<?php
    include "includes/Authorized_admin.php";
    include "includes/dbh.php";
   

    include_once("header.php");


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

            <?php
                $d = new Dbh();

                $sql = "SELECT * FROM interview ";
                $con = $d->connect();
                $res = $con->query($sql);
                if($res->num_rows<=0){
                    echo"   

            <script>
            function validation(){
            var date1 = document.forms['regester2']['date'];
            var time1 = document.forms['regester2']['time'];
                  
                  var today =  new Date();
                  var date =  new Date(date1.value);


                  if(!((today-date)<0)){
                    window.alert('enter correct date');
                    date.focus;
                    return false;
                  }


                return true;
            }
            </script>
            <div class='content-info' style='top:300px'>
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Call interview. NOW!</h2>   
                    </div>
                 
                 
                    <div class='sub-main-w3'>   
                       <form action='includes/INTERVIEW.php' onsubmit='return validation()' name='regester2' method='post'>
                            Date:<br>
                            <input type='date' value='date' name='date'>
                           <br>
                           Time:<br>
                            <input type='time' value='time' name='time' min='08:00:00' max='16:00:00'>
                           <br>
                           <input type='submit' value='Submit' name='inter_submit'>
                        </form> 
                    </div>
                </div> 
            </div>  ";
                }
                else{
                    echo " <div class='content-info'  style='
                    top:300px'>
                                <div class='main-content-agile'>
                                    <div class='wthree-pro'>
                                        <h2>Drop exsisting interview befor calling new!</h2>               
                                    </div>
                                </div>
                            </div>
                                 ";
                }

            ?>


            


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
