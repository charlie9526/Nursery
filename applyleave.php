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
                <div class='main-content-agile' style="width:90%;height:100%;">
                    <div class='wthree-pro'>
                        <h2>Apply Leave</h2>               
                    </div>
                    <div class='sub-main-w3' style="width:100%;clear:left" > 
                        <form action='includes/Homework.php' method='POST'>
                            <div style="width:40%;float:left;margin-right: 4%">
                                <label style='float:left'>Full Name</label><input type="text" name="title"  required="" disabled value="<?php echo $_SESSION['u_first'].' '.$_SESSION['u_last']; ?>">
                                <label style='float:left'>User ID</label>
                                <input type="text" name="title" value ="<?php echo $_SESSION['u_uid']?>" required="" disabled>
                                <label style='float:left'>From Date</label>
                                <input  class='btn' type="date" name="fromDate" id='frmDate' required="">
                                <label style='float:left'>To Date</label>
                                <input class='btn' type="date" name="toDate" id='toDate' required="">
                                
                            </div>
                            <div style="width:40%;float:left;margin-right: 4%">
                                <label style='float:left'>Notes</label><br>
                                <textarea id='notes' style='text-align:left' cols='50' rows='16' name='notes' required></textarea>
                                <button class='button-login' id='submitLeave' type='submit' name='Apply Leave'>Submit Homework</button>
                            </div>
                    </div>
                    <br>
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
            $('#submitLeave').click(function(e){
                e.preventDefault();
                if(validate()){
                    fromDate = $('#frmDate').val();
                    toDate =  $('#toDate').val();
                    notes = $('#notes').val();
                    var posting = $.post( "includes/Leave.php", { applyleave: "true", fromDate : fromDate, toDate: toDate, notes:notes} );
                    posting.done(function( data ) {
                        alert(data);
                    });

                    posting.fail(function(){

                    });
                }
            });

            function validate(){
                isValid = true;
                frmDate = $('#frmDate').val();
                toDate = $('#toDate').val();

                d1 = new Date(frmDate);
                d2 = new Date(toDate);
                d3 = d1 - d2;
                if(!$('#frmDate').val()){
                    //Fill the from date
                    alert("Fill the from date");
                    isValid  = false;
                } else if (!$('#toDate').val()){
                    //Fill the to Date
                    alert("Fill the to Date");
                    isValid  = false;
                } else if(!$('#notes').val()){
                    //Fill the notes
                    alert("Fill the notes");
                    isValid  = false;
                } else if(d3>0){
                    //Invalid Dates
                    alert("From Date can't be greater than to Date!");
                    isValid = false;
                }
                return isValid;
            }
            
        </script>