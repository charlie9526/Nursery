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
                            include_once("sessiondecide.php");
                    ?>
                      
                    
            </div>
            <div class='content-info'>                
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Payment Form</h2>
                        <br>
                        <form action='includes/pay.inc.php' method='POST'>
                        
                                <h3>Upload Payment Receipt Here</h3>
                                <h3><input type="file" name="upload" style="font-size:15pt" ></h3>

                            <div class='sub-main-w3'>
                                <button class='button-login' type='submit' name='submit'>SUBMIT</button>   
                            </div>
                            
                        </form>				
                    </div>
                    
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
    </body>
</html>
