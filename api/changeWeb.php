<?php
	include './conn2.php';

	$id = (string)$mypost->id;
	$ustr = (string)$mypost->ustr;
    
    $status = array("status"=>200);
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    $updateWchat = "UPDATE web SET wchat='$ustr' WHERE id='$id'";
	$res_insert = mysqli_query($conn,$updateWchat);

	if ($res_insert) {
        echo json_encode($status);
	} else {
	    echo "error";
	}
?>     