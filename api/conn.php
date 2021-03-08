<?php
header('Content-Type:application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers:x-requested-with,content-type,test-token,test-sessid,Authorization');

if($_SERVER['HTTP_AUTHORIZATION'] === null){ //http授权认证
    echo json_encode(array("status"=>403,"message"=>"error")); 
    exit();
} 

$servername = "localhost";
$username = "webnes";
$password = "webnes";
$dbname = "webnes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?> 