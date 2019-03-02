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
                        <h2>Progress Report</h2>               
                    </div>
                    <div class='sub-main-w3'>   
                        <form action='includes/Homework.php' method='POST'>
                            <div style="width:30%;float:left;margin-right: 4%">
                                <label style='float:left'>Sinhala</label><input type="text" name="title" placeholder="Sinhala" required="" disabled>
                                <label style='float:left'>Mathematics</label>
                                <input type="text" name="title" placeholder="Maths" required="" disabled>
                                <label style='float:left'>Environment</label>
                                <input type="text" name="title" placeholder="Environment" required="" 
                                disabled>
                                <label style='float:left'>Games</label>
                                <input type="text" name="title" placeholder="Games" required="" disabled>
                                <label style='float:left'>Handicrafts</label>
                                <input type="text" name="title" placeholder="Handicrafts" required="" disabled>
                            </div>
                            <div style="width:40%;float:left;margin-right: 4%">
                                <label style='float:left'>Student ID</label>
                                <input type="text" name="stdid" placeholder="ID" required="" disabled>
                                <label style='float:left'>Comments</label>                             
                                <textarea id='commentReport' name="Description" cols='40' rows='18' placeholder="Comments" required disabled></textarea><br>
                                <input type='checkbox' id='enableEdit'  ><label>Edit Data</label>
                                <button class='button-login' type='submit' id="submitReport" name='addHomework'>Submit Report</button>
                            </div>

                            
                        </form>
                        <div style="width:20%;float:left">
                                <label style='float:left'>Select Student</label>
                                <input type="text" list="names" id="stdSelectReport"  name="stdName" placeholder="Student Name" required="">
                                <datalist id='names'>

                                </datalist>
                                <button class='button-login' type='submit' id='getReport'>Get Report</button>
                            </div>
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
            $('#stdSelectReport').keyup(function(){
                var posting = $.post( "includes/ProgressReport.php", { getReportNames: "true", stdName : this.value} );
                            posting.done(function( data ) {
                            //var content = $( data ).find( "#content" );
                                  $( "#names" ).empty().append( data );
                            });
            });

            $('#getReport').click(function(){
                var name = $('#stdSelectReport').val().split(' ');
                user_last = name[1];
                user_first = name[0];

                var getID = $.post( "includes/ProgressReport.php", { getId: "true", user_first : user_first, user_last:user_last} );
                getID.done(function(data){
                    var posting = $.post( "includes/ProgressReport.php", { getReportData: "true", stdId : data} );
                            id = data;
                            var state = $('#enableEdit')[0].checked = false;
                            posting.done(function( data ) {
                            //var content = $( data ).find( "#content" );
                            if(data != ""){
                                //alert(data);
                                array = JSON.parse(data);
                                var inputs = document.getElementsByTagName('form')[1].getElementsByTagName('input');
                                for(i=0;i<6;i++){
                                    inputs[i].value = array[i];
                                }
                                document.getElementById('commentReport').innerText = array[6];
                            } else {
                                //alert(data);
                                var inputs = document.getElementsByTagName('form')[1].getElementsByTagName('input');
                                for(i=0;i<5;i++){
                                    inputs[i].value = " ";
                                }
                                inputs[5].value = id;
                                document.getElementById('commentReport').innerText = " ";
                            }
                        });
                });
                 

            });

            function editReport(){
                var state = $('#enableEdit')[0].checked;
                if(state == true){
                    state = false;
                } else {
                    state = true;
                }
                var inputs = document.getElementsByTagName('form')[1].getElementsByTagName('input');
                for(i=0;i<5;i++){
                    inputs[i].disabled = state;
                }
                document.getElementById('commentReport').disabled = state;
            }

            setInterval(editReport,400);

            $("#submitReport").click(function(event){
                event.preventDefault();
                var inputs = document.getElementsByTagName('form')[1].getElementsByTagName('input');
                data = [];
                for(i=0;i<6;i++){
                    data[i] = inputs[i].value;
                }
                comments = document.getElementById('commentReport').value;
                
                var posting = $.post( "includes/ProgressReport.php", { submitReport: "true", sinhala : data[0], math: data[1], environment : data[2], game: data[3], handicraft :data[4], user_uid: data[5], comments: comments } );
                    posting.done(function( data ) {
                        //var content = $( data ).find( "#content" );
                        
                        //$( "#names" ).empty().append( data );
                    });
            });
        </script>
    </body>
</html>
