<?php
    session_start();
    include_once("header.php");

?>          
            <div class="button-group">
            <a href="index.php" class="btn btn-outline-success button-sm">HOME</a>
            <a href="about.php" class="btn btn-outline-success button-sm">ABOUT</a>
            <a href="viewstaff.php" class="btn btn-outline-success button-sm">OUR STAFF</a>
            <a href="achievements.php" class="btn btn-outline-success button-sm">ACHIEVEMENTS</a>
            <a href="contact.php" class="btn btn-outline-success button-sm">CONTACT US</a>
                
            </div>
            <video autoPlay muted loop id="myvideo" >
                            <source src="assets/videos/background.mp4" type="video/mp4">
            </video> 

            
                    <?php
                    	echo " 
							<div class='content'>
									<div class='main-content-agile'>
										<div class='wthree-pro'>
											<h2>Login Now</h2>
										</div>
									
										<div class='sub-main-w3'>
											<form action='includes/login.inc.php' method='POST'>
												<input placeholder='Username/Email' name='uid' type='text' >
												<input placeholder='Password' name='pwd' type='Password' >
												<button class='button-login' type='submit' name='submit'>Login</button>
												
											</form>
										</div>			
									</div>
								</div>
                            ";
                        ?>
				</div>
				
			
       

        <!-- JS -->
        <script src="assets/js/plugins/jquery.mb.YTPlayer.min.js"></script>
        <script src="assets/js/plugins/jquery.mb.vimeo_player.min.js"></script>
        <script src="assets/js/plugins/animate-headline.js"></script>
        <script src="assets/js/main.js"></script>

       
    </body>
</html>
