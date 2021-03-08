<?php
	include './conn2.php';
     
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    for($i=10001;$i<=20000;$i++){
     if($i%2 == 0){
     	 $sql = "INSERT INTO datas31(id, time, wchat, keyword, engine, ip, city, web, url, urls, phone, copy) VALUES (".$i.", '2020-07-01 11:58:53', 'xps19', '宝宝湿疹', '神马', '192.168.2.108', '江苏省南京市秦淮区', '伪百度83', 'm.bpzbbs.com', 'http://m.bpzbbs.com/zt/19/#evxt', 'oppo', '长按复制')";
		 //querysql
		 $res_insert = mysqli_query($conn,$sql);
     }else{
         $sql = "INSERT INTO datas31(id, time, wchat, keyword, engine, ip, city, web, url, urls, phone, copy) VALUES (".$i.", '2020-07-01 11:58:53', 'xps82', '宝宝湿疹', '百度', '192.168.2.108', '江苏省南京市秦淮区', '伪百度83', 'm.bpzbbs.com', 'http://m.bpzbbs.com/zt/19/#evxt', 'iphone', '长按复制')";
		 //querysql
		 $res_insert = mysqli_query($conn,$sql);
     }
     /*if($i%2 == 0){
     	 $sql = "INSERT INTO datauv31(id, time, wchat) VALUES (".$i.", '2020-07-01 11:58:53', 'xps19')";
		 //querysql
		 $res_insert = mysqli_query($conn,$sql);
     }else{
         $sql = "INSERT INTO datauv31(id, time, wchat) VALUES (".$i.", '2020-07-01 11:58:53', 'xps82')";
		 //querysql
		 $res_insert = mysqli_query($conn,$sql);
     }*/




	}
	if ($res_insert) {
        echo "yes";
	} else {
	    echo "error";
	}
?>     