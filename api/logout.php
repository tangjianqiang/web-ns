<?php
    include './conn.php';

    $token = $_GET["token"];
    
	if($token !== ''){
		$updateStatus = "UPDATE login SET status='0'";
		$res_insert = mysqli_query($conn,$updateStatus);
		echo json_encode(array("statusCode"=>"1"));
	}else{
		echo json_encode(array("statusCode"=>"0"));
	}
	$conn->close();
?>     