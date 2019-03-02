<?php
    session_start();
    include_once("header.php");

?>            
            
          
            <div class="button-group">
                    <a href="index.php" class="btn btn-outline-success button-sm">HOME</a>
                    <a href="about.php" class="btn btn-outline-success button-sm">ABOUT</a>
                    <a href="viewstaff.php" class="btn btn-outline-success button-sm">Our Staff</a>
                    <a href="achievements.php" class="btn btn-outline-success button-sm">ACHIEVEMENTS</a>
                    <a href="contact.php" class="btn btn-outline-success button-sm" >CONTACT US</a>
                    <?php
                            include_once("sessiondecide.php");
                    ?>
                    
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
