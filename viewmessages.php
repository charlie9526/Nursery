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
                        <h2>Messages</h2>				
                    </div>
                    <div class='sub-main-w3' id="sendMessages">	
                        
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

        	var posting = $.post( "includes/Message.php", { getMessages: "true"} );
            posting.done(function( data ) {
            	//var content = $( data ).find( "#content" );
                var array = JSON.parse(data);
                //alert(data);
                colors = ['#9c27b0','#ff5722','#ffc107','#4CAF50','#795548','#3f51b5','#607d8b','#f44336'];
                i=0;
                for(msg in array.send){
                	data = document.createElement('a');
                	data.class = 'btn btn-outline-success button-sm';
                	data.style ='background-color:'+colors[i]+';width: 100%;margin-bottom:4px;height:25px;padding:2px 2px 2px 2px;color:black;overflow:hidden;font-size:18px';
                	data.innerHTML = "<img src='assets/images/Message.png' height='16px'><b style='float:left'>" +" </b>"+ array.send[msg][2];
                	$("#sendMessages").append(data);
                	i++;
                	if(i==7){
                		i=0;
                	}
                }
            });
        </script>
    </body>
</html>
