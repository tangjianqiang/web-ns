<?php
	include './conn2.php';
     
	$name = (string)$mypost->name;
	$url = (string)$mypost->url;
	$wchat = (string)$mypost->wchat;
	$describes = (string)$mypost->describes;
	$alert = (string)$mypost->alert;
	$groups = (string)$mypost->groups;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($name !== ''){
    	//插入
    	$enterWeb = "INSERT INTO  web (website, url, wchat, describes, alert, groups) VALUES ('$name','$url','$wchat','$describes','$alert','$groups')";	
    }
	$res_insert = mysqli_query($conn,$enterWeb);
    
    $sql = "SELECT id FROM web WHERE url='$url'";

	$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $arr[] = $row;
	    }
		echo json_encode($arr);
	} else {
	    echo "0";
	}
	$conn->close();
?>     