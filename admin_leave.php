<?php
    include "includes/Authorized_admin.php";
    include "includes/dbh.php";


    include_once("header.php");
    $d = new Dbh(); 


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
                if(isset($_POST['id']) && isset($_POST["approved"])){
                    $id = $_POST['id'];
                    $sql = "UPDATE leaveapplications SET state='approved' WHERE leave_id='$id'";
                    $result = mysqli_query($d->connect(),$sql);
                }
                elseif(isset($_POST['id']) && isset($_POST["cancel"])){
                    $id = $_POST['id'];
                    $sql = "UPDATE leaveapplications SET state='cancel' WHERE leave_id='$id'";
                    $result = mysqli_query($d->connect(),$sql);
                }

            ?>

            <div class="content-info" width="600px" style='
                    top:300px'>
                <div class='main-content-agile' width="500px">
                    <div class='wthree-pro'>
                        <h2>Teachers' leaves</h2>				
                    </div>
                        <table class="w3-table-all w3-large">
                        <tr class="w3-red">
                            <th width="40px">Leave ID</th>
                          <th width="50px">First Name</th>
                          <th width="50px">Last Name</th>
                          <th width="49px">user ID</th>
                          <th width="90px">From</th>
                          <th width="90px">To</th>
                         <th width="100px">Notes</th>
                         <th width="80px">Action</th>
                        </tr>
                        
<?php
             
    $sql = "SELECT * FROM leaveapplications";
    $result = mysqli_query($d->connect(),$sql);
    if(mysqli_num_rows($result)<1){
        exit();
    }
    
    
    while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
        $x = 0;
        echo "<tr>";
        while($x<7){
            echo "<td style='margin-left:4px'>".$row[$x]."</td>";
            $x+=1;
        }
        
        if($row[7]==""){
            echo "<td ><form action='' method=
            'POST'><input name='id' value='$row[0]' type='hidden'><button class='w3-btn w3-blue-grey w3-margin' name='approved'>Approve</button><button class='w3-btn w3-blue-grey' name='cancel'>Reject</button></form></td>";
        } else if($row[7]=="approved"){
            echo "<td>Approved</td>";
        } else{
            echo "<td>Canceled</td>";
        }
        echo "</tr>";
    }
    echo "</table>"
?>
                </div> 
                    
            </div>  
            
            <?php
	           include_once('header.php');
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
