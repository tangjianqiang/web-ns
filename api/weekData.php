<?php
	include './conn2.php';
     
	$data = (string)$mypost->data;
	$select = (string)$mypost->select;
	$status = (string)$mypost->status;
   
    $b=array();
    $c=array();
    $d=array();
    $e=array();
    $f=array();
    $g=array();
    $h=array();
    $i=array();
    $j=array();
    $k=array();
    $l=array();
    $m=array();
    $n=array();
    $o=array();
    $base=array();

    $date=array();
    //查询当天
    $startToday=date("Y-m-d 00:00:00");
    $endToday=date("Y-m-d 23:59:59");
    //查询昨天
    $beforeStartToday=date("Y-m-d 00:00:00",strtotime("-1 day"));
    $beforeEndToday=date("Y-m-d 23:59:59",strtotime("-1 day"));
    //查询前天
    $beforeStartToday1=date("Y-m-d 00:00:00",strtotime("-2 day"));
    $beforeEndToday1=date("Y-m-d 23:59:59",strtotime("-2 day"));
    //查询大前天
    $beforeStartToday2=date("Y-m-d 00:00:00",strtotime("-3 day"));
    $beforeEndToday2=date("Y-m-d 23:59:59",strtotime("-3 day"));
    //查询前第四天
    $beforeStartToday3=date("Y-m-d 00:00:00",strtotime("-4 day"));
    $beforeEndToday3=date("Y-m-d 23:59:59",strtotime("-4 day"));
    //查询前第五天
    $beforeStartToday4=date("Y-m-d 00:00:00",strtotime("-5 day"));
    $beforeEndToday4=date("Y-m-d 23:59:59",strtotime("-5 day"));
    //查询前第六天
    $beforeStartToday5=date("Y-m-d 00:00:00",strtotime("-6 day"));
    $beforeEndToday5=date("Y-m-d 23:59:59",strtotime("-6 day"));

    //日期
    $date1 = date("d");
    $date2 = date("d",strtotime("-1 day"));
    $date3 = date("d",strtotime("-2 day"));
    $date4 = date("d",strtotime("-3 day"));
    $date5 = date("d",strtotime("-4 day"));
    $date6 = date("d",strtotime("-5 day"));
    $date7 = date("d",strtotime("-6 day"));
  
    array_push($date,$date7,$date6,$date5,$date4,$date3,$date2,$date1);
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

    $sql5 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$beforeStartToday1' AND '$beforeEndToday1'"; //前天
  
    $result5 = mysqli_query($conn,$sql5); 

    $sql6 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$beforeStartToday1' AND '$beforeEndToday1'";    //前天

    $result6 = mysqli_query($conn,$sql6); 

    $sql7 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$beforeStartToday2' AND '$beforeEndToday2'"; //大前天
  
    $result7 = mysqli_query($conn,$sql7); 

    $sql8 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$beforeStartToday2' AND '$beforeEndToday2'";    //大前天

    $result8 = mysqli_query($conn,$sql8); 


    $sql9 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$beforeStartToday3' AND '$beforeEndToday3'"; //前第四天
  
    $result9 = mysqli_query($conn,$sql9); 

    $sql10 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$beforeStartToday3' AND '$beforeEndToday3'";    //前第四天

    $result10 = mysqli_query($conn,$sql10); 


    $sql11 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$beforeStartToday4' AND '$beforeEndToday4'"; //前第五天
  
    $result11 = mysqli_query($conn,$sql11); 

    $sql12 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$beforeStartToday4' AND '$beforeEndToday4'";    //前第五天

    $result12 = mysqli_query($conn,$sql12); 

    $sql13 = "SELECT * FROM datas".$data." WHERE time BETWEEN '$beforeStartToday5' AND '$beforeEndToday5'"; //前第六天
  
    $result13 = mysqli_query($conn,$sql13); 

    $sql14 = "SELECT * FROM datauv".$data." WHERE time BETWEEN '$beforeStartToday5' AND '$beforeEndToday5'";    //前第六天

    $result14 = mysqli_query($conn,$sql14); 

    //取出指定base里的数据
    $sqlb = "SELECT wchat FROM base".$select;

    $resultb = mysqli_query($conn,$sqlb);  


    if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) { 
	        $arr[] = $row;
	    }
		$b =  $arr;
	}
	if ($result2->num_rows > 0) {
	    // output data of each row
	    while($row = $result2->fetch_assoc()) {  
	        $arr2[] = $row;
	    }
		$c = $arr2; 
	}
	if ($result3->num_rows > 0) {
	    // output data of each row
	    while($row = $result3->fetch_assoc()) {  
	        $arr3[] = $row;
	    }
		$d = $arr3; 
	}
	if ($result4->num_rows > 0) {
	    // output data of each row
	    while($row = $result4->fetch_assoc()) {  
	        $arr4[] = $row;
	    }
		$e = $arr4; 
	}
	if ($result5->num_rows > 0) {
	    // output data of each row
	    while($row = $result5->fetch_assoc()) {  
	        $arr5[] = $row;
	    }
		$f = $arr5; 
	}
	if ($result6->num_rows > 0) {
	    // output data of each row
	    while($row = $result6->fetch_assoc()) {  
	        $arr6[] = $row;
	    }
		$g = $arr6; 
	}
	if ($result7->num_rows > 0) {
	    // output data of each row
	    while($row = $result7->fetch_assoc()) {  
	        $arr7[] = $row;
	    }
		$h = $arr7; 
	}
	if ($result8->num_rows > 0) {
	    // output data of each row
	    while($row = $result8->fetch_assoc()) {  
	        $arr8[] = $row;
	    }
		$i = $arr8; 
	}
	if ($result9->num_rows > 0) {
	    // output data of each row
	    while($row = $result9->fetch_assoc()) {  
	        $arr9[] = $row;
	    }
		$j = $arr9; 
	}
	if ($result10->num_rows > 0) {
	    // output data of each row
	    while($row = $result10->fetch_assoc()) {  
	        $arr10[] = $row;
	    }
		$k = $arr10; 
	}
	if ($result11->num_rows > 0) {
	    // output data of each row
	    while($row = $result11->fetch_assoc()) {  
	        $arr11[] = $row;
	    }
		$l = $arr11; 
	}
	if ($result12->num_rows > 0) {
	    // output data of each row
	    while($row = $result12->fetch_assoc()) {  
	        $arr12[] = $row;
	    }
		$m = $arr12; 
	}
	if ($result13->num_rows > 0) {
	    // output data of each row
	    while($row = $result13->fetch_assoc()) {  
	        $arr13[] = $row;
	    }
		$n = $arr13; 
	}
	if ($result14->num_rows > 0) {
	    // output data of each row
	    while($row = $result14->fetch_assoc()) {  
	        $arr14[] = $row;
	    }
		$o = $arr14; 
	}
    
    if ($resultb->num_rows > 0) {
	    // output data of each row
	    while($row = $resultb->fetch_assoc()) {  
	        $arrb[] = $row;
	    }
		$base = $arrb; 
	}
    
    $json = array("status"=> $status, "wchat"=> $base, "date"=> $date, "a" => $b, "a1" => $c, "b" => $d, "b1" => $e, "c" => $f, "c1" => $g, "d" => $h, "d1" => $i, "e" => $j, "e1" => $k, "f" => $l, "f1" => $m, "g" => $n, "g1" => $o);

	echo json_encode($json,JSON_PRETTY_PRINT);

	$conn->close();
?>     