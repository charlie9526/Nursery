<?php
    include "includes/Authorized_admin.php";
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
            
            <div class="content-info" style="top:96px">
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Change password</h2>				
                    </div>
                    <div class='sub-main-w3'>	
                        <form action='includes/pwdchange.inc.php' method='POST'>
                            <input type="text" name="uid" placeholder="Username/E-mail">
                            <input type="password" name="currentpwd" placeholder="Current password">
                            <input type="password" name="newpwd" placeholder="New password">
                            <input type="password" name="confirmpwd" placeholder="Confirm the new password">	
                            
                            <button class='button-login' type='submit' name='submit'>CHANGE PASSWORD</button>
                        </form>
                    </div>
                </div> 
            </div>  
            <?php
    
                if ($_SESSION["u_type"]==2){
                    include_once("teacherstuffbackground.php");
                }
                elseif($_SESSION["u_type"]==5){
                    include_once("adminstuff background.php");
                }
             ?>
          
                        
            
        
            
        </div>


        <!-- JS -->
        <script src="assets/js/plugins/slick.min.js"></script>
        <script src="assets/js/plugins/animate-headline.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
