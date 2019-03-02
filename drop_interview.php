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
                    echo " <div class='content-info'  style='
                    top:300px'>
                                <div class='main-content-agile'>
                                    <div class='wthree-pro'>
                                        <h2>Nothing to drop</h2>               
                                    </div>
                                </div>
                            </div>
                                 ";
                }
                else {
                    echo "            <div class='content-info' style='
                    top:300px'>
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Drop interview. NOW!</h2>               
                    </div>
                 
                 
                    <div class='sub-main-w3'>   
                       <form action='includes/INTERVIEW.php' method='post'>

                           <br>
                           <input type='submit' value='drop interview' name='drop_submit'>
                        </form> 
                    </div>
                </div> 
            </div> ";
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
