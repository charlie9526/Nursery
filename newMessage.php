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
                        <h2>New Message</h2>				
                    </div>
                    <div class='sub-main-w3'>	
                        <form action='includes/Message.php' method='POST'>
                            <select  id="msgRec" name="Receiver" style='float:left;height:20%;width:90%;margin-bottom: 2%'>
                                  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
                            </select><br><br>
                            <textarea  name="Message" cols='100' rows='15' placeholder="Description of home work" required></textarea><br>
                            
                            <button class='button-login' type='submit' name='sendMessage'>Send Message</button>
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

        <script>
            var posting = $.post( "includes/Message.php", { getContact: "true"} );
                            posting.done(function( data ) {
                            //var content = $( data ).find( "#content" );
                                  $( "#msgRec" ).empty().append( data );
                            });

        </script>
    </body>
</html>
