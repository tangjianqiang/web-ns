<?php
	include './conn2.php';
     
	$datav = (string)$mypost->datav;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($groups !== ''){
         $sql = "SELECT id,website,url FROM web WHERE groups='$datav'";    
    }

	$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) { 
	        $arr[] = $row;
	    }
	    echo json_encode($arr);
	}else {
	    echo "0";
	}

	$conn->close();
?>   