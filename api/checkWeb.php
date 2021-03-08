<?php
	include './conn2.php';
     
	$url = (string)$mypost->url;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($url !== ''){
         $sql = "SELECT id FROM web WHERE url='$url'";    
    }

	$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) { 
	        $arr[] = $row;
	    }
	    echo json_encode($arr);
	}

	$conn->close();
?>     