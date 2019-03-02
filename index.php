<?php
    session_start();
    include_once("header.php");
    include "includes/dbh.php";

?>
                        
            <div class="button-group">
                <a href="about.php" class="btn btn-outline-success button-sm">ABOUT</a>
                <a href="viewstaff.php" class="btn btn-outline-success button-sm">OUR STAFF</a>
                <a href="achievements.php" class="btn btn-outline-success button-sm">ACHIEVEMENTS</a>
                <a href="contact.php" class="btn btn-outline-success button-sm">CONTACT US</a>
                <?php
                            include_once("sessiondecide.php");
                ?>
            </div>
            <?php 
                $d = new Dbh();

                $sql = "SELECT * FROM interview ";
                $con = $d->connect();
                $res = $con->query($sql);   
                $R = $res->fetch_array(MYSQLI_NUM);
                $sd = $R[0];
                $td = $R[2];
                if($res->num_rows>0){
                    echo " <div class='content-info' style='
            top:200px'>
                            <div class='main-content-agile'>
                                <div class='wthree-pro'>
                                    <h2>INTERVIEW DATE-:$sd</h2>
                                    <h2>INTERVIEW DATE-:$td</h2>				
                                </div>
                            </div>
                        </div>";
                }
            ?>    
            
            <!-- Options headline effects: .rotate | .slide | .zoom | .push | .clip -->
            <section class="hero-section hero-section--image clearfix clip">
                <div class="hero-section__wrap">
                    <div class="hero-section__option">
                        <img src="assets/images/index.jpg" alt="Hero section image">
                    </div>
                    <!-- .hero-section__option -->                    
                    <div class="container">
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8">
                                <div class="title-01 title-01--11 text-center">
                                    <h2 class="title__heading">
                                        <span>Tiny Tots is</span>
                                        <strong class="hero-section__words">
                                            <span class="title__effect is-visible">Great</span>
                                            <span class="title__effect">Cool</span>
                                            <span class="title__effect">Creative</span>
                                        </strong>
                                    </h2>

                                    <!-- Options btn color: .btn-success | .btn-info | .btn-warning | .btn-danger | .btn-primary -->
                                    <div class="title__action"><a href="login.php" class="btn btn-success">Login Here</a></div>
                                </div> <!-- .title-01 -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <!-- JS -->
        <script src="assets/js/plugins/animate-headline.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
