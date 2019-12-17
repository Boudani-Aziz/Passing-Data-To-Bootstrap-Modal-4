<?php 
	include 'dbconnection.php';
									
	$conn = new mysqli($servername, $username, $password, $dbname);
			
	if (isset($_POST["ID"])) {
		$ID = $_POST["ID"];
				
		$sqlQuery = "SELECT * FROM students WHERE ID = ".$ID;
		
		$result = mysqli_query($conn, $sqlQuery);
		
		$row = mysqli_fetch_assoc($result);
		echo $row["FirstName"]." ".$row["LastName"];
	}
	else {
		echo "Error.";
	}
?>
