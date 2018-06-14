<?php
include "class/user.class.php";
$userlog = new login();

if(isset($_REQUEST['submit'])) {
	extract($_REQUEST);
	$login = $userlog->userLogin($username, $password);
	if($login) {
		header("location: stock.php");
		} else {
			echo "Wrong username or password";
		}
	}
?>