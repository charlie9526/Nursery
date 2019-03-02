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
            <div class="content-info"  style="top:90px;">
                <div class='main-content-agile' style="width:90%;height:90%">
                    <div class='wthree-pro'>
                        <h2>Home Works</h2>               
                    </div>
                    <div class='sub-main-w3' id="showHomework"> 
                        
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
        <script>
            function getHomeWorks(){+
                var posting = $.post( "includes/HomeWork.php", { getHomework: "true"} );
                posting.done(function( data ) {
                    $('#showHomework').append(data);
                });
                
            }
            getHomeWorks();
        </script>
    </body>
</html>
