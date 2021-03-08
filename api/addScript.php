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
    	/*定义网站添加链接*/
	    $url = '<script src="http://web-ns.xpfamily.com/static/online.php?uid='.$id.'"></script>';
    	//插入
    	$enterScript = "UPDATE web SET script='$url' WHERE id='$id'";
    }
	$res_insert = mysqli_query($conn,$enterScript);
    
	if ($res_insert) {
        echo json_encode($status);
	} else {
	    echo "error";
	}
?>     