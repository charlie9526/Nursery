<?php
    include "includes/Authorized_admin.php";
    include_once("header.php");
    include "includes/dbh.php";

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

            echo"<script>

                function validation()                
                {
                  var name = document.forms['RegForm1']['uid'];
                  if (name.value == '')                
                  {
                    window.alert('incorrect input.');
                    name.focus();
                    return false;
                  } else if(!check()){
                    return false;
                    window.alert('incorrect input.');
                  }
                  </script>

                <div class='content-info' style='
                    top:300px'>
                    <div class='main-content-agile' >
                        <div class='wthree-pro'>
                            <h2>Child Attendance</h2>             
                        </div>
                        <br>
                        <form action='includes/attendance.inc.php' onsubmit='return validation()' method='POST' name='RegForm1'>
                            <label for='date'>From</label>
                            <input type='date' name='fromdate' min='2017-12-31' id='fromdate'>
                                    
                            <label for='date'>To</label>
                            <input type='date' name='todate' min='2017-12-31'  id='todate'>
                            <br>

                            User uid:<input id='uid' type='text' value='' name='uid'>
                            <br>
                            
                            <button class='button-login' type='submit' name='submit'>GET ATTENDANCE</button>
                           
                        </form>  


                        <br>

                    </div> 
                    
                </div> ";
            ?>
             <?php  
             if(isset($_GET['login'])){
                include 'includes/checkalerts.inc.php';
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

        <script>

            function check(){
                uid = $('#uid').val();
                var posting = $.post( "includes/Attendance.php", { check: "" , uid: uid } );
                            posting.done(function( data ) {
                            //var content = $( data ).find( "#content" );
                                  if(data==""){
                                    return false;
                                  }
                                  return true;
                            });

            }
            
        </script>
    </body>
</html>
