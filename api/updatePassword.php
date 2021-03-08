<?php
	include './conn2.php';
	
	$pwd = (string)$mypost->pwd;
	$newpwd = (string)$mypost->newpwd;
    
    //md5加密验证
	$pwd = md5($pwd);
	$newpwd = md5($newpwd);
	//成功状态200
	$returnStatus200 = array("status"=>200); 
	//错误状态400
	$returnStatus400 = array("status"=>400); 
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($pwd){
        $sql = "SELECT status FROM login WHERE password='$pwd'";  
    }
    $result = mysqli_query($conn,$sql);
    
    if ($result->num_rows > 0) {
    	if($result){
    		$updatePassword = "UPDATE login SET password='$newpwd'";
    	}
    	$res_insert = mysqli_query($conn,$updatePassword);
        /*$updatePassword = "UPDATE login SET password='$newpwd'";
        $res_insert = mysqli_query($conn,$updatePassword);*/
        echo json_encode($returnStatus200);
    }else {
	    echo json_encode($returnStatus400);
	}

    $conn->close();
	//ajax默认是以application/x-www-form-urlencoded方式提交,在PHP中使用$_POST方式可以轻松获取
	//axios默认使用的是application/json,$_POST是接收不到值的，必须使用$GLOBALS['HTTP_RAW_POST_DATA'],如fetch、axios默认的请求头就是application/json，所以要注意一下
?>     