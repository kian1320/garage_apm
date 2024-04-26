<?php

if(isset($_SESSION['user_level'])){
	if($_SESSION['user_level']==9){
		if(isset($_GET['logout_button'])){
			unset($_SESSION['id']);
			unset($_SESSION['fullname']);
			unset($_SESSION['user_level']);
			unset($_SESSION['user_id']);

			$_SESSION['reply'] = "Logout Successfully";
			header("Location: ../../../login.php");
		}

	}else{
		$_SESSION['reply'] = "Site is restricted to manager only";
		header("Location: ../../../login.php");
	}
}else{
	$_SESSION['reply'] = "Your Session has Expired Please Login Again";
	header("Location: ../../../login.php");
}
?>