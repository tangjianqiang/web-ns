<?php
	include './conn2.php';
     
	$data = (string)$mypost->data;
   
    $b=array();
    $c=array();
    $d=array();
    $e=array();
    $f=array();
    $g=array();
    //查询当天
    $startToday=date("Y-m-d 00:00:00");
    $endToday=date("Y-m-d 23:59:59");
    //查询昨天
    $beforeStartToday=date("Y-m-d 00:00:00",strtotime("-1 day"));
    $beforeEndToday=date("Y-m-d 23:59:59",strtotime("-1 day"));
    //查询当月
    $firstday = date('Y-m-01');
    $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($data !== ''){
    	//查询
    	 $sql = "SELECT * FROM datas".$data." WHERE time BETWEEN '$startToday' AND '$endToday'"; //当天

    }
    $result = mysqli_query($conn,$sql); 

    $sql2 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$startToday' AND '$endToday'";    //当天

    $result2 = mysqli_query($conn,$sql2); 


    $sql3 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$beforeStartToday' AND '$beforeEndToday'"; //昨天
  
    $result3 = mysqli_query($conn,$sql3); 

    $sql4 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$beforeStartToday' AND '$beforeEndToday'";    //昨天

    $result4 = mysqli_query($conn,$sql4); 

    $sql5 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$firstday' AND '$lastday'"; //本月
  
    $result5 = mysqli_query($conn,$sql5); 

    $sql6 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$firstday' AND '$lastday'";    //本月

    $result6 = mysqli_query($conn,$sql6); 




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
	if ($result3->num_rows > 0) {
	    // output data of each row
	    while($row = $result3->fetch_assoc()) {  //数组3
	        $arr3[] = $row;
	    }
		$d = $arr3; 
	}
	if ($result4->num_rows > 0) {
	    // output data of each row
	    while($row = $result4->fetch_assoc()) {  //数组4
	        $arr4[] = $row;
	    }
		$e = $arr4; 
	}
	if ($result5->num_rows > 0) {
	    // output data of each row
	    while($row = $result5->fetch_assoc()) {  //数组5
	        $arr5[] = $row;
	    }
		$f = $arr5; 
	}
	if ($result6->num_rows > 0) {
	    // output data of each row
	    while($row = $result6->fetch_assoc()) {  //数组6
	        $arr6[] = $row;
	    }
		$g = $arr6; 
	}
    
    $json = array("copyToday" => $b, "visitToday" => $c, "copyBeforeToday" => $d, "visitBeforeToday" => $e, "copyMonth" => $f, "visitMonth" => $g);

	echo json_encode($json,JSON_PRETTY_PRINT);

	$conn->close();
?>     