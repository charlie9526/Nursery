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

            <div class="content-info" style='
            top:300px'>
                <div class='main-content-agile'>
                    <div class='wthree-pro'>
                        <h2>Clear last year finance table</h2>				
                    </div>
                    <div class='sub-main-w3'>	
                       <form action="" method="post">
                           <input type="submit" value="clear" name="clear">
                        </form> 
                    </div>
                    <div class='wthree-pro'>
                        <h2>How many finances this year?</h2>				
                    </div>
                    <div class='sub-main-w3'>	
                       <form action="" method="post">
                            count:<br>
                            <input type="text" placeholder="count" name="count">
                           <br>
                           <input type="submit" value="Submit" name="count_submit">
                        </form> 
                    </div>
                </div> 
            </div>  



            <?php
                $db = new Dbh();
                $conn = $db->connect();

                if(isset($_POST["clear"])){
                     $sql="TRUNCATE TABLE financedinfo";
                     $res = $conn->prepare($sql);
                     $res->execute();
                }
                elseif(isset($_POST["count_submit"])){
                    $count=$_POST["count"];
                    $_SESSION["count"] = $count;
                    $count = (string)$count;
                    if(!(is_numeric ( $count ))|| ($count<5) || ($count>10)){header("Location:f_register.php");}
                    else{header("Location:f_register_form.php");}
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
