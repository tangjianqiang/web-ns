<?php
	include './conn2.php';
     
	$id = (string)$mypost->id;
    
    $status = array("status"=>200);
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($id !== ''){
       $deleteWeb = "DELETE FROM web WHERE id = '$id'";  //删除web
    }
	$res_insert = mysqli_query($conn,$deleteWeb);
    
    $deleteBase = "DROP TABLE base".$id;

	$res_base = mysqli_query($conn,$deleteBase);

	if ($res_base) {
        echo json_encode($status);
	} else {
	    echo "error";
	}
	//ajax默认是以application/x-www-form-urlencoded方式提交,在PHP中使用$_POST方式可以轻松获取
	//axios默认使用的是application/json,$_POST是接收不到值的，必须使用$GLOBALS['HTTP_RAW_POST_DATA'],如fetch、axios默认的请求头就是application/json，所以要注意一下
?>     