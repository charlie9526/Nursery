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
            
            <div class="content-info"  style="top:90px">
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Add HomeWork</h2>				
                    </div>
                    <div class='sub-main-w3'>	
                        <form action='includes/Homework.php' method='POST'>
                            <input type="text" name="title" placeholder="HomeWork Title" required="">
                            <textarea  name="Description" cols='100' rows='15' placeholder="Description of home work" required></textarea><br>
                            <input class='btn' type="date" name="date" placeholder="Due Date" required>
                            <button class='button-login' type='submit' name='addHomework'>Submit Homework</button>
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
