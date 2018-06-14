<?php

include "class/user.class.php";

$object = new users();
$connect = $object->connect("localhost", "root", "", "inv");

if(!$connect){
	echo "mbola";
} else {
	//echo "success";
}

//adding a user
if(isset($_POST['add'])) {
	$name = $_POST['fname'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$role = $_POST['role'];
	$status = $_POST['status'];

	$check = $object->select();
	//$count = mysqli_num_rows($check);

	if($pass1 != $pass2) {
		echo "<div class='alert alert-warning'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        <b>The passwords do not match!</b>
    </div>";
	}

	else {$insert = $object->insert($name, $dob, $email, $phone, $username, $pass2, $role, $status);

	if($insert) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
	} else {
		echo "Faileddddd";
	}
}
}

//updating user details
if(isset($_POST['edits'])) {
	//$euser = $_POST['edits'];
	$ename = $_POST['efname'];
	$edob = $_POST['edob'];
	$eemail = $_POST['eemail'];
	$ephone = $_POST['ephone'];
	$eusername = $_POST['eusername'];
	$epass1 = $_POST['epass1'];
	$epass2 = $_POST['epass2'];
	$euser = $_POST['useid'];
	//$status = $_POST['estatus'];

	$check = $object->select();
	//$count = mysqli_num_rows($check);

	if($epass1 != $epass2) {
		echo "<div class='alert alert-warning'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        <b>The passwords do not match!</b>
    </div>";
	}

	else {$insert = $object->update($ename, $edob, $eemail, $ephone, $eusername, $epass2, $euser);

	if($insert) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
    echo "<script type='text/javascript'> window.location.href = 'users.php'; </script>";
	} else {
		echo "Failed";
	}
}
}

//deleting users
if(isset($_GET['del'])) {
	$userid = $_GET['del'];
	#$status = 0;

	$del = $object->delete($userid);

	if($del === TRUE) {
		echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>×</button> User has been deactivated</div>";
	} else {
		
	}
}

//activating users
if(isset($_GET['act'])) {
	$userid = $_GET['act'];
	#$status = 0;

	$act = $object->activate($userid);

	if($act === TRUE) {
		echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>×</button> User has been Activated </div>";
	} else {
		
	}
}

//reseting the password
if(isset($_POST['passreset'])) {
	$username = $_POST['username'];
	$epass1 = $_POST['pass1'];
	$pass = $_POST['pass2'];
	

	if($epass1 != $pass) {
		echo "<div class='alert alert-warning'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        <b>The passwords do not match!</b>
    </div>";
	}

	else {$insert = $object->updatePass($username, $pass);

	if($insert) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful! <a href='index.php'> Login </a>
    </div>";
	} else {
		echo "Failed";
	}
}
}

?>