<?php
    include "includes/Authorized_admin.php";
    include ("header.php");
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
            if (!(($_SESSION["count"])!="")){
                header ("Location:t_register.php");
            }
            ?>
            
            <?php
            
            echo"<script>

                function validation()                
                {
                  var name = document.forms['RegForm']['l_name'];      
                  var email = document.forms['RegForm']['e_mail']; 
                  var phone = document.forms['RegForm']['tp']; 
                  var what = document.forms['RegForm']['f_name']; 
                  var password = document.forms['RegForm']['password']; 
                  var address = document.forms['RegForm']['adress']; 
                  var date1 = document.forms['RegForm']['day'];
                  


                  var today =  new Date();
                  var date =  new Date(date1.value);

                  if (name.value == '')                
                  {
                    window.alert('Please enter your last name.');
                    name.focus();
                    return false;
                  }

                  if (what.value == '')                
                  {
                    window.alert('Please enter your first name.');
                    what.focus();
                    return false;
                  }



                  if (address.value.indexOf(',', 0) < 0)       
                  {
                    window.alert('Please enter a valid address.');
                    address.focus();
                    return false;
                  }

                  if (address.value == '')               
                  {
                    window.alert('Please enter your address.');
                    address.focus();
                    return false;
                  }

                  if (email.value == '')                 
                  {
                    window.alert('Please enter a valid e-mail address.');
                    email.focus();
                    return false;
                  }
                  

                  if (email.value.indexOf('@', 0) < 0)       
                  {
                    window.alert('Please enter a valid e-mail address.');
                    email.focus();
                    return false;
                  }

                  if (email.value.indexOf('.', 0) < 0)       
                  {
                    window.alert('Please enter a valid e-mail address.');
                    email.focus();
                    return false;
                  }

                  if (phone.value == '')             
                  {
                    window.alert('Please enter your telephone number.');
                    phone.focus();
                    return false;
                  }

                  if (password.value == '')          
                  {
                    window.alert('Please enter your password');
                    password.focus();
                    return flase;
                  }


                  if(!((today-date)>0)){
                    window.alert('enter correct date');
                    date.focus;
                    return false;
                  }

                  return true;
                }
                </script>
                    <div class='content-info' style='
            top:140px'>
                        <div class='main-content-agile'>
                            <div class='wthree-pro'>
                                <h2>register teacher</h2>				
                            </div>
                    

                            <div class='sub-main-w3'>	
                       <form action='includes/Register.php' onsubmit='return validation()' method='post' name='RegForm'>
                            First name:<input type='text' value='' name='f_name'>
                           <br>
                           Last name:<input type='text' value='' name='l_name'>
                           <br>
                            Telephone:<input type='text' value='' name='tp'>
                           <br>
                           Adress:<input type='text' value='' name='adress'>
                           <br>
                           e-mail:<input type='text' value='' name='e_mail'>
                           <br>
                           Password:<input type='text' value='' name='password'>
                           <br>
                           Birthday:<input class='w3-text-gray w3-center w3-input w3-light-gray' type='date' id='day' name='day'>
                           <br>
                           <input type='submit' value='Submit' name='teacher_submit' id='teacher_submit'>
                        </form> 
                    </div>
                </div> 
            </div>";
                            
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
