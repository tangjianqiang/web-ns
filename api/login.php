<?php
    include './conn3.php';
     
	$user = (string)$mypost->username;
	$pwd = (string)$mypost->password;
	$status = (string)$mypost->status;

	if($pwd === ''){
        echo json_encode(array("status"=>403,"message"=>"error")); 
	    exit();
	}

    //md5加密验证
	$pwd = md5($pwd);
	//错误状态400
	$returnStatus400 = array("status"=>400); 
	/*连接服务器*/

	$servername = "localhost";
	$username = "webnes";
	$password = "webnes";
	$dbname = "webnes";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

    if($user !== ''){
       $sql = "SELECT username,nickname,male,phone,email,textarea,status FROM login WHERE username='$user' AND password='$pwd'";  
    }
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
    	//成功取到值
    	$updateStatus = "UPDATE login SET status='$status' WHERE id = 1";  //更改status状态

    	$result_inert = mysqli_query($conn,$updateStatus);

    	if($result_inert){

            $selectResult = "SELECT username,nickname,male,phone,email,textarea,status FROM login WHERE status='1'";  //获取更改后的登录信息

	        $result_select = mysqli_query($conn,$selectResult);

	        if ($result_select->num_rows > 0) {
	           // output data of each row
			    while($row = $result_select->fetch_assoc()) {
			        $arr[] = $row;
			    }
				$json = array("status"=> 200, "token"=>time(), "info"=> $arr);

	            echo json_encode($json,JSON_PRETTY_PRINT);
	        }
    	}
	} else {
	    echo json_encode($returnStatus400);
	}
	$conn->close();
?>     