<?php
	include './conn2.php';
     
	$data = (string)$mypost->data;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($data !== ''){
    	//查询
    	$sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$data;
    }
    
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