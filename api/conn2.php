<?php
   header('Access-Control-Allow-Origin: *');
   header("Access-Control-Allow-Headers: Authorization");
   header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
  

    if($_SERVER['HTTP_AUTHORIZATION'] === null){ //http授权认证
	    echo json_encode(array("status"=>403,"message"=>"error")); 
	    exit();
    } 
   

    $servername = "localhost";
	$username = "webnes";
	$password = "webnes";
	$dbname = "webnes";
     
    $rws_post = $GLOBALS['HTTP_RAW_POST_DATA'];
	$mypost = json_decode($rws_post);
  
//登录成功后每次都要axios请求都要header携带token，防止非法请求
//token值在登录成功后，后台返回给前端，前端写进cookie中
//前端默认10分钟无任何操作结束本次登录状态
?>
