<?php
    session_start();
    include_once("header.php");

?>          
                       
            <div class="button-group">
                <a href="index.php" class="btn btn-outline-success button-sm">Home</a>
                <a href="about.php" class="btn btn-outline-success button-sm">About</a>
                <a href="viewstaff.php" class="btn btn-outline-success button-sm">Our Staff</a>
                <a href="achievements.php" class="btn btn-outline-success button-sm">Achievements</a>
                <?php
                            include_once("sessiondecide.php");
                        ?>
            </div>
            
            <section class="hero-section hero-section--slider clearfix">
                
                <div class="hero-section__wrap">
                
                    <div class="container">    
                        <div class="boxed-topic">
                            <div class="wthree-pro h2">
                                Contact Us 
                            </div>
                        </div>                
                        
                        <div class="hover-container-small">
                            <div class="main-content-agile">
                                <div class="box">
                                   
                                </div>
                            </div>
                            
                            <div class="main-content-agile">
                                <div class="box">
                                   
                                </div>
                            </div>

                            <div class="main-content-agile">
                                <div class="box">
                                   
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Options slick plugin: data-arrows="true/false" | data-dots="true/false" | data-fade="true/false" | data-autoplay="true/false/number" | data-speed="number" -->
                    <div class="hero-section__option" data-init="slick" data-arrows="false" data-dots="true" data-fade="false" data-autoplay="7000" data-speed="5000">
                        <img src="assets/images/index.jpg" alt="Hero section image">
                        <img src="assets/images/mid-bg.jpg" alt="Hero section image">
                        <img src="assets/images/index-slider2.jpg" alt="Hero section image">
                        <img src="assets/images/teach.jpeg" alt="Hero section image">
                    </div>
                    <!-- .hero-section__option -->

                </div>

                <!-- .hero-section__wrap -->
            </section>
            <!-- .hero-section -->
        </div>


        <!-- JS -->
        <script src="assets/js/plugins/slick.min.js"></script>
        <script src="assets/js/plugins/animate-headline.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
