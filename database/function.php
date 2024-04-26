<?php

function username_suggest(){
	include('conn.php');
  	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 	
  	$username = substr(str_shuffle($str_result), 
                       0, 6);
  	$username2 = md5($username);
  	
	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username2'");

	if(mysqli_num_rows($query)){
		username_suggest(); 
	}else{ 
		return $username; 
	}
}

function record_status($value){
	if($value == 0 )return "PENDING";
	if($value == 1 )return "READY";
	if($value == 2 )return "ONGOING";
	if($value == 3 )return "FINISHED";
	if($value == 4 )return "CANCELLED";
}
function record_service_status($value){
	if($value == 0 )return "READY";
	if($value == 1 )return "DONE";
}
?>