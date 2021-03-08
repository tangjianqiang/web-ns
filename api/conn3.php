<?php
    header("Access-Control-Allow-Origin: *");
    //后端必须允许前端定义Content-Type之类的头请求
	header('Access-Control-Allow-Headers:x-requested-with,content-type,test-token,test-sessid,Authorization');//注意头部自定义参数不要用下划线
   
    $rws_post = $GLOBALS['HTTP_RAW_POST_DATA'];
	$mypost = json_decode($rws_post);
	
  
//登录成功后每次都要axios请求都要header携带token，防止非法请求
//token值在登录成功后，后台返回给前端，前端写进cookie中
//前端默认10分钟无任何操作结束本次登录状态
?>
