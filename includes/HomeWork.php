<?php
	include "Dbh.php";
	include "Redirect.php";

	if(isset($_POST['addHomework'])){
		$db = new Dbh();
		$connection = $db->connect();
		$data = array($_POST['title'],$_POST['Description'],$_POST['date']);
		echo $_POST['title'];
		$sql = "INSERT INTO homework (title,content,due_date) VALUES (? , ? , ?)";
		echo $sql;
		$res = $connection->prepare($sql);
		$res->bind_param('sss',$data[0],$data[1],$data[2]);
		$state = $res->execute();
		Redirect::to("addHomeWork");
	} else if(isset($_POST['getHomework'])) {
		$sql = "SELECT 	id,title,content,due_date FROM homework ORDER BY due_date";
		$db = new Dbh();
		$connection = $db->connect();
		$result = $connection->query($sql);
		if ($result->num_rows > 0) {
	    	// output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<div  style='float:left;width:30%;border-radius:2px;border-style:groove;height:30%;text-align: justify;padding:5px 5px 5px 5px'>";
		        echo "<header style='font-siz:10px;color:black'><b>" . $row["title"]. "</b></header><br><p><h1>".$row["content"][0]. substr($row["content"],1)." <br> <br></p><footer>Date:". $row["due_date"]."</footer><br>";
		        echo "<a href='index.php' style='top:18px;' class='btn btn-outline-success button-sm'>Delete</a>";
		        echo "</div>";
		    }
		    
		} else {
		    echo "0 results";
		}
	}
?>

