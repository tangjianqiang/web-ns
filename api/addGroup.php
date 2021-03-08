<?php
	include './conn2.php';
     
	$groups = (string)$mypost->groups;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($groups !== ''){   //防止重复插入，以及插入空字符串问题
       $enterGroup = "INSERT INTO groups (groups) VALUES ('$groups')";              //创建用户组
    }
	$res_insert = mysqli_query($conn,$enterGroup);
    
    $sql = "SELECT id FROM groups WHERE groups='$groups'";                           //查询groups为$groups的id用于创建datas数据表

	$result = mysqli_query($conn,$sql);

	while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
		$crateSql = "CREATE TABLE datas".$row[0]."(                                        
			id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY comment 'ID', 
			time Datetime NOT NULL comment '复制时间',
			wchat VARCHAR(30) NOT NULL comment '复制微信',
			keyword VARCHAR(50) NOT NULL comment '搜索关键词',
			engine VARCHAR(10) NOT NULL comment '搜索引擎',
			ip VARCHAR(20) NOT NULL comment 'IP',
			city VARCHAR(20) NOT NULL comment '省市区',
			web VARCHAR(20) NOT NULL comment '访问网站',
			url VARCHAR(20) NOT NULL comment '访问域名',
			urls VARCHAR(50) NOT NULL comment '访问url',
			phone VARCHAR(10) NOT NULL comment '手机型号',
			copy VARCHAR(10) NOT NULL comment '复制方式'
	   )";
	   $crateSql2 = "CREATE TABLE datauv".$row[0]."(                                        
			id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY comment 'ID', 
			time Datetime NOT NULL comment '访问时间',
			wchat VARCHAR(30) NOT NULL comment '访问微信'
	   )";
	}
                                                                                    //创建数据表
	$res_sql_insert = mysqli_query($conn,$crateSql);

	$res_sql_insert2 = mysqli_query($conn,$crateSql2);

	if ($res_sql_insert && $res_sql_insert2) {
        echo "<br/>";
	} else {
	    echo "<br/>";
	}
	//ajax默认是以application/x-www-form-urlencoded方式提交,在PHP中使用$_POST方式可以轻松获取
	//axios默认使用的是application/json,$_POST是接收不到值的，必须使用$GLOBALS['HTTP_RAW_POST_DATA'],如fetch、axios默认的请求头就是application/json，所以要注意一下
?>     