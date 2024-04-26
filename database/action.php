<?php
include('conn.php');
session_start();
//========================================================LOGIN
if(isset($_POST['login'])){
	$username = md5($_POST['username']);
	$password = md5($_POST['password']);

	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
	if(mysqli_num_rows($query)){
		$user = mysqli_fetch_array($query);
		$user_id = $user['id'];
		$user_level = $user['user_level'];

		if($user_level == 9){
			$query2 = mysqli_query($con, "SELECT * FROM `manager` WHERE `user_id`='$user_id' ");
			$manager = mysqli_fetch_array($query2);

			$_SESSION['fullname'] = $manager['fullname'];
			$_SESSION['id'] = $manager['id'];
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_level'] = 9;

			$_SESSION['reply'] = "Success: You are Logged in as Manager";
			header("Location: ../webpage/manager/main/home.php");
		}
		if($user_level == 0){
			$query2 = mysqli_query($con, "SELECT * FROM `customers` WHERE `user_id`='$user_id' ");
			$customer = mysqli_fetch_array($query2);

			$_SESSION['fullname'] = strtoupper($customer['lname']).", ".$customers['fname']." ".$customers['mname'];
			$_SESSION['id'] = $customer['id'];
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_level'] = 0;


			$_SESSION['reply'] = "Success: You are Logged in as Customer";

			header("Location: ../webpage/customer/main/home.php");
		}

	}else{
		$_SESSION['reply'] = 'Failed: Wrong Username or Password Please Try Again';
		header("Location: ../login.php");
	}
}if(isset($_POST['username_update'])){
	$user_id = $_SESSION['user_id'];
	$username = md5($_POST['username']);
	$new_username = md5($_POST['new_username']);
	$password = md5($_POST['password']);
	$link = '../webpage/manager/others/username_update.php';
	if($_SESSION['user_level']==0){

		$link = '../webpage/customer/others/username_update.php';
	}
	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
	if(mysqli_num_rows($query)){
		$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$new_username' ");
		if(mysqli_num_rows($query)==0){
			mysqli_query($con, "UPDATE `user` SET `username`='$new_username' WHERE `id`='$user_id' ");
			$_SESSION['reply'] = 'Success: Username is updated';
			header("Location: ".$link);

		}else{
			$_SESSION['reply'] = 'Failed: Username Already Exists';
			header("Location: ".$link);

		}
	}else{
		$_SESSION['reply'] = 'Failed: Wrong Username or Password Please Try Again';
		header("Location: ".$link);
	}
}
if(isset($_POST['password_update'])){
	$user_id = $_SESSION['user_id'];
	$username = md5($_POST['username']);
	$new_password = md5($_POST['new_password']);
	$password = md5($_POST['password']);
	$link = '../webpage/manager/others/password_update.php';
	if($_SESSION['user_level']==0){
		$link = '../webpage/customer/others/password_update.php';
	}
	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
	if(mysqli_num_rows($query)){
		
		mysqli_query($con, "UPDATE `user` SET `password`='$new_password' WHERE `id`='$user_id'");
		$_SESSION['reply'] = 'Success: Password is updated';
		header("Location: ".$link);

	}else{
		$_SESSION['reply'] = 'Failed: Wrong Username or Password Please Try Again';
		header("Location: ".$link);
	}
}
//========================================================CUSTOMERS
if(isset($_POST['customer_register'])){
	$username = md5($_POST['username']);
	$password = md5($_POST['password']);
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username'");
	if(mysqli_num_rows($query)==0){

		mysqli_query($con, "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')");

		$query = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id` DESC");
		$user = mysqli_fetch_array($query);
		$user_id = $user['id'];

		mysqli_query($con, "INSERT INTO `customers`(`fname`, `mname`, `lname`, `contact`, `address`, `user_id`) VALUES ('$fname','$mname','$lname', '$contact', '$address', '$user_id')");

		$_SESSION['reply'] = "Success: You can now login";
	}else{
		$_SESSION['reply'] = "Failed: Username already exists";
	}
	
	header("Location: ../Login_v16/index.php");
}
if(isset($_POST['customer_add'])){
	$username = md5($_POST['username']);
	$password = md5($_POST['password']);
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username'");
	if(mysqli_num_rows($query)==0){

		mysqli_query($con, "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')");

		$query = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id` DESC");
		$user = mysqli_fetch_array($query);
		$user_id = $user['id'];

		mysqli_query($con, "INSERT INTO `customers`(`fname`, `mname`, `lname`, `contact`, `address`, `user_id`) VALUES ('$fname','$mname','$lname', '$contact', '$address', '$user_id')");

		$_SESSION['reply'] = "Success: Customer Added";
		header("Location: ../webpage/manager/customers/customers_show.php");
	}else{
		$_SESSION['reply'] = "Failed: Username already exists";
		header("Location: ../webpage/manager/customers/customers_add.php");
	}
}
if(isset($_POST['customer_upd'])){
	$customers_id = $_POST['customers_id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$quantity = $_POST['quantity'];

	mysqli_query($con, "UPDATE `customers` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`contact`='$contact', `address`='$address' WHERE `id`='$customers_id' ");

	$_SESSION['reply'] = "Success: Customer Updated";
	header("Location: ../webpage/manager/customers/customers_show.php");
}

if(isset($_POST['customer_del'])){
	$customers_id = $_POST['customers_id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	$_SESSION['reply'] = "Success: Customer Deleted";

	mysqli_query($con, "DELETE FROM `vehicles` WHERE `customer_id`='$customers_id'");
	mysqli_query($con, "DELETE FROM `customers` WHERE `id`='$customers_id'");
	header("Location: ../webpage/manager/customers/customers_show.php");
}

//========================================================VEHICLES
if(isset($_POST['vehicle_add'])){
	$customer_id = $_POST['customer_id'];
	$model = $_POST['model'];
	$type = $_POST['type'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($con, "INSERT INTO `vehicles`(`model`, `type`, `plate_no`, `customer_id`) VALUES ('$model','$type','$plate_no', '$customer_id') ");

	$_SESSION['reply'] = "Success: Customer Vehicle has been added";
	header("Location: ../webpage/manager/customers/customers_vehicle.php?customers_id=".$customer_id);
}
if(isset($_POST['vehicle_upd'])){
	$vehicle_id = $_POST['vehicle_id'];
	$customer_id = $_POST['customer_id'];
	$model = $_POST['model'];
	$type = $_POST['type'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($con, "UPDATE `vehicles` SET `model`='$model',`type`='$type',`plate_no`='$plate_no' WHERE `id`='$vehicle_id'");

	$_SESSION['reply'] = "Success: Customer Vehicle has been updated";
	header("Location: ../webpage/manager/customers/customers_vehicle.php?customers_id=".$customer_id);
}
if(isset($_POST['vehicle_del'])){
	$vehicle_id = $_POST['vehicle_id'];
	$customer_id = $_POST['customer_id'];
	$model = $_POST['model'];
	$type = $_POST['type'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($con, "DELETE FROM `vehicles` WHERE `id`='$vehicle_id'");

	$_SESSION['reply'] = "Success: Customer Vehicle has been deleted";
	header("Location: ../webpage/manager/customers/customers_vehicle.php?customers_id=".$customer_id);
}
if(isset($_POST['vehicle_add2'])){
	$customer_id = $_POST['customer_id'];
	$model = $_POST['model'];
	$type = $_POST['type'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($con, "INSERT INTO `vehicles`(`model`, `type`, `plate_no`, `customer_id`) VALUES ('$model','$type','$plate_no', '$customer_id') ");

	$_SESSION['reply'] = "Success: Customer Vehicle has been added";
	header("Location: ../webpage/customer/customers/customers_vehicle.php?customers_id=".$customer_id);
}
if(isset($_POST['vehicle_upd2'])){
	$vehicle_id = $_POST['vehicle_id'];
	$customer_id = $_POST['customer_id'];
	$model = $_POST['model'];
	$type = $_POST['type'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($con, "UPDATE `vehicles` SET `model`='$model',`type`='$type',`plate_no`='$plate_no' WHERE `id`='$vehicle_id'");

	$_SESSION['reply'] = "Success: Customer Vehicle has been updated";
	header("Location: ../webpage/customer/customers/customers_vehicle.php?customers_id=".$customer_id);
}
if(isset($_POST['vehicle_del2'])){
	$vehicle_id = $_POST['vehicle_id'];
	$customer_id = $_POST['customer_id'];
	$model = $_POST['model'];
	$type = $_POST['type'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($con, "DELETE FROM `vehicles` WHERE `id`='$vehicle_id'");

	$_SESSION['reply'] = "Success: Customer Vehicle has been deleted";
	header("Location: ../webpage/customer/customers/customers_vehicle.php?customers_id=".$customer_id);
}
//========================================================PRODUCTS
if(isset($_POST['product_add'])){
	$product_name = $_POST['product_name'];
	$product_code = $_POST['product_code'];
	$brand = $_POST['brand'];
	$type = $_POST['type'];
	$quantity = $_POST['quantity'];


	mysqli_query($con, "INSERT INTO `products`(`product_name`,`product_code`, `quantity`, `brand`, `type`) VALUES ('$product_name','$product_code','$quantity', '$brand', '$type')");

	$_SESSION['reply'] = "Success: Product has been added";
	header("Location: ../webpage/manager/products/products_show.php");
}
if(isset($_POST['product_upd'])){
	$products_id = $_POST['products_id'];
	$product_name = $_POST['product_name'];
	$product_code = $_POST['product_code'];
	$brand = $_POST['brand'];
	$type = $_POST['type'];
	$quantity = $_POST['quantity'];

	mysqli_query($con, "UPDATE `products` SET `product_name`='$product_name',`product_code`='$product_code',`quantity`='$quantity',`brand`='$brand', `type`='$type' WHERE `id`='$products_id' ");

	$_SESSION['reply'] = "Success: Product has been updated";
	header("Location: ../webpage/manager/products/products_show.php");
}

if(isset($_POST['product_del'])){
	$products_id = $_POST['products_id'];
	$product_name = $_POST['product_name'];
	$brand = $_POST['brand'];
	$type = $_POST['type'];
	$quantity = $_POST['quantity'];


	mysqli_query($con, "DELETE FROM `products` WHERE `id`='$products_id' ");	
	$_SESSION['reply'] = "Success: Product has been deleted";
	header("Location: ../webpage/manager/products/products_show.php");
}

if(isset($_POST['product_stock_add'])){
	$products_id = $_POST['products_id'];
	$stock = $_POST['stock'];

	$query = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$products_id'");
	$products =mysqli_fetch_array($query);

	$stock += $products['quantity'];

	mysqli_query($con, "UPDATE  `products` SET `quantity`='$stock' WHERE `id`='$products_id' ");

	$_SESSION['reply'] = "Success: Product stock has been added";
	header("Location: ../webpage/manager/products/products_show.php");
}

//========================================================mechanicS
if(isset($_POST['mechanic_add'])){
	$fullname = $_POST['fullname'];
	$nickname = $_POST['nickname'];

	mysqli_query($con, "INSERT INTO `mechanics`(`fullname`, `nickname`) VALUES ('$fullname','$nickname')");
	header("Location: ../webpage/manager/mechanics/mechanics_show.php");
}
if(isset($_POST['mechanic_upd'])){
	$mechanic_id = $_POST['mechanics_id'];
	$fullname = $_POST['fullname'];
	$nickname = $_POST['nickname'];


	mysqli_query($con, "UPDATE `mechanics` SET `fullname`='$fullname',`nickname`='$nickname' WHERE `id`='$mechanics_id' ");
	header("Location: ../webpage/manager/mechanics/mechanics_show.php");
}

if(isset($_POST['mechanic_del'])){
	$mechanics_id = $_POST['mechanics_id'];
	$fullname = $_POST['fullname'];
	$nickname = $_POST['nickname'];


	mysqli_query($con, "DELETE FROM `mechanics` WHERE `id`='$mechanics_id' ");
	header("Location: ../webpage/manager/mechanics/mechanics_show.php");
}
//========================================================SERVICES
if(isset($_POST['service_add'])){
	$service_name = $_POST['service_name'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];


	mysqli_query($con, "INSERT INTO `services`(`service_name`, `estimated_hr`, `estimated_day`) VALUES ('$service_name', '$estimated_hr', '$estimated_day')");
	header("Location: ../webpage/manager/services/services_show.php");
}
if(isset($_POST['service_upd'])){
	$services_id = $_POST['services_id'];
	$service_name = $_POST['service_name'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];


	mysqli_query($con, "UPDATE `services` SET `service_name`='$service_name',`estimated_hr`='$estimated_hr', `estimated_day`='$estimated_day' WHERE `id`='$services_id' ");
	header("Location: ../webpage/manager/services/services_show.php");
}

if(isset($_POST['service_del'])){
	$services_id = $_POST['services_id'];
	$service_name = $_POST['service_name'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "DELETE FROM `services` WHERE `id`='$services_id' ");
	header("Location: ../webpage/manager/services/services_show.php");
}
if(isset($_POST['services_products_add'])){
	$service_id = $_POST['service_id'];
	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];

	mysqli_query($con, "INSERT INTO `services_products`(`service_id`, `product_id`, `quantity`) VALUES ('$service_id', '$product_id', '$quantity') ");

	header("Location: ../webpage/manager/services/services_show.php");
}

if(isset($_POST['services_products_upd'])){
	$sp_id = $_POST['sp_id'];
	$service_id = $_POST['service_id'];
	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];

	mysqli_query($con, "UPDATE `services_products` SET `service_id`='$service_id',`product_id`='$product_id',`quantity`='$quantity' WHERE `id`='$sp_id' ");

	header("Location: ../webpage/manager/services/services_show.php");
}

if(isset($_POST['services_products_del'])){
	$sp_id = $_POST['sp_id'];
	$service_id = $_POST['service_id'];
	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];

	mysqli_query($con, "DELETE FROM `services_products` WHERE `id`='$sp_id' ");

	header("Location: ../webpage/manager/services/services_show.php");
}

if(isset($_POST['services_symptoms_add'])){
	$service_id = $_POST['service_id'];
	$description = $_POST['description'];

	mysqli_query($con, "INSERT INTO `services_symptoms`(`service_id`, `description`) VALUES ('$service_id', '$description') ");

	header("Location: ../webpage/manager/services/services_symptoms_show.php?services_id=".$service_id);
}

if(isset($_POST['services_symptoms_upd'])){
	$ss_id = $_POST['ss_id'];
	$service_id = $_POST['service_id'];
	$description = $_POST['description'];

	mysqli_query($con, "UPDATE `services_symptoms` SET `service_id`='$service_id', `description`='$description' WHERE `id`='$ss_id' ");
	header("Location: ../webpage/manager/services/services_symptoms_show.php?services_id=".$service_id);
}

if(isset($_POST['services_symptoms_del'])){
	$ss_id = $_POST['ss_id'];
	$service_id = $_POST['service_id'];
	$description = $_POST['description'];

	mysqli_query($con, "DELETE FROM `services_symptoms` WHERE `id`='$ss_id' ");

	header("Location: ../webpage/manager/services/services_symptoms_show.php?services_id=".$service_id);
}



//=========================================================recordS

if(isset($_POST['records_add'])){
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "INSERT INTO `records`(`customer_id`, `vehicle_id`, `record_date`, `estimated_hr`, `estimated_day`, `status`) VALUES ('$customer_id', '$vehicle_id', '$record_date', '$estimated_hr', '$estimated_day', 1)");

	header("Location: ../webpage/manager/records/records_show.php");
}

if(isset($_POST['record_upd'])){
	$record_id = $_POST['record_id'];
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "UPDATE `records` SET `customer_id`='$customer_id', `vehicle_id`='$vehicle_id', `record_date`='$record_date', `estimated_hr`='$estimated_hr',`estimated_day`='$estimated_day' WHERE `id`='$record_id' ");

	header("Location: ../webpage/manager/records/records_show.php");
}
if(isset($_POST['record_del'])){
	$record_id = $_POST['record_id'];
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	
	$query2 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `record_id`='$record_id'");
	while($ap =mysqli_fetch_array($query2)){
		$ap_id = $ap['id'];
		$product_id = $ap['product_id'];

		$quantity = $ap['quantity'];

		$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
		$products = mysqli_fetch_array($query3);

		$product_quantity = $products['quantity']+$quantity;

		mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");
	}

	mysqli_query($con, "DELETE FROM `records`  WHERE `id`='$record_id' ");
	mysqli_query($con, "DELETE FROM `record_services` WHERE `record_id`='$record_id' ");

	mysqli_query($con, "DELETE FROM `record_products` WHERE `record_id`='$record_id' ");
	
	header("Location: ../webpage/manager/records/records_show.php");
}

if(isset($_POST['records_add2'])){
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "INSERT INTO `records`(`customer_id`, `vehicle_id`, `record_date`, `estimated_hr`, `estimated_day`) VALUES ('$customer_id', '$vehicle_id', '$record_date', '$estimated_hr', '$estimated_day')");

	header("Location: ../webpage/manager/customers/records_show.php?customers_id=".$customer_id);
}

if(isset($_POST['record_upd2'])){
	$record_id = $_POST['record_id'];
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "UPDATE `records` SET `customer_id`='$customer_id', `vehicle_id`='$vehicle_id', `record_date`='$record_date', `estimated_hr`='$estimated_hr',`estimated_day`='$estimated_day' WHERE `id`='$record_id' ");

	header("Location: ../webpage/manager/customers/records_show.php?customers_id=".$customer_id);
}
if(isset($_POST['record_del2'])){
	$record_id = $_POST['record_id'];
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	
	$query2 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `record_id`='$record_id'");
	while($ap =mysqli_fetch_array($query2)){
		$ap_id = $ap['id'];
		$product_id = $ap['product_id'];

		$quantity = $ap['quantity'];

		$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
		$products = mysqli_fetch_array($query3);

		$product_quantity = $products['quantity']+$quantity;

		mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");
	}

	mysqli_query($con, "DELETE FROM `records`  WHERE `id`='$record_id' ");
	mysqli_query($con, "DELETE FROM `record_services` WHERE `record_id`='$record_id' ");

	mysqli_query($con, "DELETE FROM `record_products` WHERE `record_id`='$record_id' ");
	
	header("Location: ../webpage/manager/customers/records_show.php?customers_id=".$customer_id);
}
if(isset($_POST['records_add3'])){
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "INSERT INTO `records`(`customer_id`, `vehicle_id`, `record_date`, `estimated_hr`, `estimated_day`, `status`) VALUES ('$customer_id', '$vehicle_id', '$record_date', '$estimated_hr', '$estimated_day', 0)");

	header("Location: ../webpage/customer/customers/records_show.php");
}

if(isset($_POST['record_upd3'])){
	$record_id = $_POST['record_id'];
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	mysqli_query($con, "UPDATE `records` SET `customer_id`='$customer_id', `vehicle_id`='$vehicle_id', `record_date`='$record_date', `estimated_hr`='$estimated_hr',`estimated_day`='$estimated_day' WHERE `id`='$record_id' ");

	header("Location: ../webpage/customer/customers/records_show.php");
}
if(isset($_POST['record_del3'])){
	$record_id = $_POST['record_id'];
	$record_date = $_POST['record_date'];
	$customer_id = $_POST['customer_id'];
	$vehicle_id = $_POST['vehicle_id'];
	$estimated_hr = $_POST['estimated_hr'];
	$estimated_day = $_POST['estimated_day'];

	
	$query2 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `record_id`='$record_id'");
	while($ap =mysqli_fetch_array($query2)){
		$ap_id = $ap['id'];
		$product_id = $ap['product_id'];

		$quantity = $ap['quantity'];

		$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
		$products = mysqli_fetch_array($query3);

		$product_quantity = $products['quantity']+$quantity;

		mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");
	}

	mysqli_query($con, "DELETE FROM `records`  WHERE `id`='$record_id' ");
	mysqli_query($con, "DELETE FROM `record_services` WHERE `record_id`='$record_id' ");

	mysqli_query($con, "DELETE FROM `record_products` WHERE `record_id`='$record_id' ");
	
	header("Location: ../webpage/customer/customers/records_show.php");
}

if(isset($_POST['record_status_upd'])){
	$record_id = $_POST['record_id'];
	$official_receipt = $_POST['official_receipt'];
	$status = $_POST['status'];

	mysqli_query($con, "UPDATE `records` SET  `status`='$status', `official_receipt`='$official_receipt' WHERE `id`='$record_id' ");
	if($status==2){
		$date = date('Y-m-d');
		mysqli_query($con, "UPDATE `records` SET  `start_date`='$date' WHERE `id`='$record_id' ");
	}
	if($status==3){
		$date = date('Y-m-d');
		mysqli_query($con, "UPDATE `records` SET  `end_date`='$date' WHERE `id`='$record_id' ");
	}

	if($status==4){
		$date = '0000-00-00';
		mysqli_query($con, "UPDATE `records` SET  `start_date`='$date', `end_date`='$date', `official_receipt`='' WHERE `id`='$record_id' ");
	}
	header("Location: ../webpage/manager/records/records_show.php");
}
if(isset($_POST['record_status_del'])){
	$record_id = $_POST['record_id'];

	mysqli_query($con, "DELETE FROM `records` WHERE `id`='$record_id' ");
	mysqli_query($con, "DELETE FROM `record_services` WHERE `record_id`='$record_id' ");

	mysqli_query($con, "DELETE FROM `record_products` WHERE `record_id`='$record_id' ");
	header("Location: ../webpage/manager/records/records_show.php");
}
if(isset($_POST['record_services_add'])){
	$record_id = $_POST['record_id'];

	$query2 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `record_id`='$record_id'");
	while($ap =mysqli_fetch_array($query2)){
		$ap_id = $ap['id'];
		$product_id = $ap['product_id'];

		$quantity = $ap['quantity'];

		$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
		$products = mysqli_fetch_array($query3);

		$product_quantity = $products['quantity']+$quantity;

		mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");
	}


	mysqli_query($con, "DELETE FROM `record_services` WHERE `record_id`='$record_id' ");
	mysqli_query($con, "DELETE FROM `record_products` WHERE `record_id`='$record_id' ");

	$estimated_day=0;
	$estimated_hr=0;
	$record_id = $_POST['record_id'];
	$query = mysqli_query($con, "SELECT * FROM `services` ORDER BY `service_name` DESC");
	while($services =mysqli_fetch_array($query)){
		$serv_id = $services['id'];
		if(isset($_POST['serv'.$serv_id])){
			$services_id = $_POST['serv'.$serv_id];
			$estimated_hr += $services['estimated_hr'];
			$estimated_day += $services['estimated_day'];

			mysqli_query($con, "INSERT INTO `record_services`(`record_id`, `service_id`) VALUES ('$record_id', '$services_id')");

			$query4 = mysqli_query($con, "SELECT * FROM `record_services` ORDER BY `id` DESC");
			$rs = mysqli_fetch_array($query4);
			$rs_id = $rs['id'];

			$query2 = mysqli_query($con, "SELECT * FROM `services_products` WHERE service_id='$serv_id'");
			while($sp =mysqli_fetch_array($query2)){
				$sp_id = $sp['id'];
				$product_id = $sp['product_id'];

				if(isset($_POST['quantity'.$sp_id])){
					$quantity = $_POST['quantity'.$sp_id];
					mysqli_query($con, "INSERT INTO `record_products`(`record_id`, `product_id`, `service_id`, `quantity`, `rs_id`) VALUES ('$record_id', '$product_id', '$serv_id', '$quantity', '$rs_id')");

					$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
					$products = mysqli_fetch_array($query3);

					$product_quantity = $products['quantity']-$quantity;

					mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");
				}
			}

		}
	}
	$estimated_day += floor($estimated_hr/24);
	$estimated_hr %= 24;

	mysqli_query($con, "UPDATE `records` SET  `estimated_hr`='$estimated_hr',`estimated_day`='$estimated_day' WHERE `id`='$record_id' ");

	header("Location: ../webpage/manager/records/records_services_show.php?records_id=".$record_id);
}

if(isset($_POST['record_services_upd'])){
	$rs_id = $_POST['rs_id'];
	$record_id = $_POST['record_id'];
	$mechanic_id = $_POST['mechanic_id'];
	$date_finished = $_POST['date_finished'];
	$status = $_POST['status'];

	mysqli_query($con, "UPDATE `record_services` SET  `mechanic_id`='$mechanic_id',`status`='$status', `date_finished`='$date_finished' WHERE `id`='$rs_id' ");
	
	header("Location: ../webpage/manager/records/records_services_show.php?records_id=".$record_id);
}

if(isset($_POST['record_services_del'])){
	$rs_id = $_POST['rs_id'];
	$record_id = $_POST['record_id'];

	mysqli_query($con, "DELETE FROM `record_services` WHERE `id`='$rs_id' ");

	mysqli_query($con, "DELETE FROM `record_products` WHERE `rs_id`='$rs_id' ");
	
	header("Location: ../webpage/manager/records/records_services_show.php?records_id=".$record_id);
}


if(isset($_POST['record_products_add'])){
	$record_id = $_POST['record_id'];
	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];

	$query = mysqli_query($con, "SELECT * FROM `record_products` WHERE `product_id`= '$product_id' AND  `record_id`= '$record_id'");

	if(mysqli_num_rows($query)){
		$rp =mysqli_fetch_array($query);
		$quantity += $rp['quantity'];
		$rp_id = $rp['id']; 

		mysqli_query($con, "UPDATE `record_products` SET  `quantity`='$quantity' WHERE `id`='$rp_id' ");
	}else{
		mysqli_query($con, "INSERT INTO `record_products`(`record_id`, `product_id`, `quantity`) VALUES ('$record_id', '$product_id', '$quantity')");
	}
	
	
	header("Location: ../webpage/manager/records/records_services_show.php?records_id=".$record_id);
}

if(isset($_POST['record_products_upd'])){
	$rp_id = $_POST['rp_id'];
	$record_id = $_POST['record_id'];
	$quantity = $_POST['quantity'];

	$product_id = $_POST['product_id'];
	$old_quantity = $_POST['old_quantity'];

	$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
	$products = mysqli_fetch_array($query3);

	$product_quantity = $products['quantity']-($quantity-$old_quantity);

	mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");
	

	mysqli_query($con, "UPDATE `record_products` SET `quantity`='$quantity' WHERE `id`='$rp_id' ");
	
	
	header("Location: ../webpage/manager/records/records_services_show.php?records_id=".$record_id);
}

if(isset($_POST['record_products_del'])){
	$rp_id = $_POST['rp_id'];
	$record_id = $_POST['record_id'];
	$product_id = $_POST['product_id'];
	$old_quantity = $_POST['old_quantity'];


	$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
	$products = mysqli_fetch_array($query3);

	$product_quantity = $products['quantity']+($quantity-$old_quantity);

	mysqli_query($con, "UPDATE `products` SET  `quantity`='$product_quantity' WHERE `id`='$product_id' ");

	mysqli_query($con, "DELETE FROM `record_products` WHERE `id`='$rp_id' ");

	header("Location: ../webpage/manager/records/records_services_show.php?records_id=".$record_id);
}

?>