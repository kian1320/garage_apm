<?php
session_start();
if(isset($_SESSION['reply'])){
	echo $_SESSION['reply'];
	$_SESSION['reply']= "";
	unset($_SESSION['reply']);
}
	//echo md5('123');
?>
<form action='database/action.php' method='post'>
	<input type='text' name='username' placeholder='Enter Username' autofocus required><br>
	<input type='text' name='password' placeholder='Enter Password' required><br>

	<input type='submit' name='login' value='LOGIN'>
</form>

<a href='customers_register.php'><button>REGISTER</button></a>