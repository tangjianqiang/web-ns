<?php
	include './conn2.php';
     
	$id = (string)$mypost->id;
	$alert = (string)$mypost->alert;
   
    $status = array("status"=>200);
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    if($id !== ''){
    	$sql = "CREATE TABLE base".$id."(
			id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY comment 'ID', 
			name VARCHAR(10) NOT NULL comment '微信名称',
			wchat VARCHAR(30) NOT NULL comment '微信号',
			status VARCHAR(10) NOT NULL comment '状态'
		)";
        
		if ($conn->query($sql) === TRUE) {
		    echo json_encode($status);
		} else {
		    echo $conn->error;  
		}
		$conn->close();
    }
    
?>  