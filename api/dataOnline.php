<?php
    include './conn4.php';
     
    $uid = (string)$mypost->uid;
   
    $b=array();
    $c=array();

	
    // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($uid !== ''){
    	//查询
    	 $sql = "SELECT id,name,wchat,status FROM base".$uid; 

    }
    $result = mysqli_query($conn,$sql); 

    $sql2 = "SELECT website,alert,groups FROM web WHERE id=".$uid;

    $result2 = mysqli_query($conn,$sql2); 

    if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {  //数组1
	        $arr[] = $row;
	    }
		$b =  $arr;
	}

	if ($result2->num_rows > 0) {
	    // output data of each row
	    while($row = $result2->fetch_assoc()) {  //数组2
	        $arr2[] = $row;
	    }
		$c = $arr2; 
	}
    
    $json = array("data" => $b, "web" => $c);

	echo json_encode($json,JSON_PRETTY_PRINT);

	$conn->close();
?>     