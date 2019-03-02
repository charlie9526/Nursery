<?php

	include_once('header.php');
?>

<?php
    include "includes/dbh.inc.php";

    if(isset($_POST['id']) && isset($_POST["approved"])){
        $id = $_POST['id'];
        $sql = "UPDATE leaveapplications SET state='approved' WHERE leave_id='$id'";
        $result = mysqli_query($conn,$sql);
    }
    elseif(isset($_POST['id']) && isset($_POST["cancel"])){
        $id = $_POST['id'];
        $sql = "UPDATE leaveapplications SET state='cancel' WHERE leave_id='$id'";
        $result = mysqli_query($conn,$sql);
    }
    
    ?>
<table class="w3-table-all w3-large">
    <tr class="w3-red">
        <th>Leave ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>user ID</th>
      <th>From</th>
      <th>To</th>
     <th>Notes</th>
     <th>Action</th>
    </tr>
<?php
    $sql = "SELECT * FROM leaveapplications";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)<1){
        exit();
    }
    
    
    while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
        $x = 0;
        echo "<tr>";
        while($x<7){
            echo "<td>".$row[$x]."</td>";
            $x+=1;
        }
        
        if($row[7]==""){
            echo "<td><form action='' method=
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
