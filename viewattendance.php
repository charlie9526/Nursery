<?php
    session_start();
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

             
            <div class="content-info">
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Attendance</h2>             
                    </div>
                    <br>
                    <form action="includes/attendance.inc.php" method="POST">
                        <label for="date">From</label>
                        <input type="date" name="fromdate" min="2017-12-31" id="fromdate">
                                
                        <label for="date">To</label>
                        <input type="date" name="todate" min="2017-12-31"  id="todate">
                        
                        <button class='button-login' type='submit' name='submit'>GET ATTENDANCE</button>
                       
                    </form>                        
                    <br>
                    <?php  
                         if(isset($_GET['login'])){
                        include 'includes/checkalerts.inc.php';
                         }
                    
                    ?>
                </div> 
                
            </div> 

        
 





            <?php
                    
                    include_once("teacherstuffbackground.php");
             ?>
          
                        
            
        
            
        </div>


        <!-- JS -->
        <script src="assets/js/plugins/slick.min.js"></script>
        <script src="assets/js/plugins/animate-headline.js"></script>
        <script src="assets/js/main.js"></script>

        <script >
            function getHomeWork(){
                
            }
        </script>
    </body>
</html>
