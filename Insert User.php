<?php
	include "classes.php";
	$user = new user();

	if(isset($_POST['UserName']) && isset($_POST['UserEmail']) && isset($_POST['UserPassword'])){
		$user->setUsername($_POST['UserName']); 
		$user->setUserEmail($_POST['UserEmail']);
		$user->setUserPassword(sha1($_POST['UserPassword']));
		$user->setcpassword($_POST['cpassword']);
		$user->InsertUser();

		header("Location:index.php?success=1");
	}
?>