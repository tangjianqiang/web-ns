<?php
	include './conn2.php';
     
	$groups = (string)$mypost->groups;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($groups !== ''){
       $deleteGroup = "DELETE FROM groups WHERE id = '$groups'";   //删除groups表中的用户组
    }
	$res_insert = mysqli_query($conn,$deleteGroup);

	$sql = "SELECT id FROM web WHERE groups='$groups'";
    
    $result = mysqli_query($conn,$sql);

	$deleteWebGroup = "DELETE FROM web WHERE groups = '$groups'";   //删除groups表中关联web表groups组

	$res_insert2 = mysqli_query($conn,$deleteWebGroup);

    $deleteWebDatas = "DROP TABLE datas".$groups;   //删除datas

	$res_insert3 = mysqli_query($conn,$deleteWebDatas);

	$deleteWebDataUv = "DROP TABLE datauv".$groups;   //删除datauv

	$res_insert4 = mysqli_query($conn,$deleteWebDataUv);

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
 
	//ajax默认是以application/x-www-form-urlencoded方式提交,在PHP中使用$_POST方式可以轻松获取
	//axios默认使用的是application/json,$_POST是接收不到值的，必须使用$GLOBALS['HTTP_RAW_POST_DATA'],如fetch、axios默认的请求头就是application/json，所以要注意一下
?>     