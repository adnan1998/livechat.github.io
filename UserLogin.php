<?php
	session_start();
	include "classes.php";

	if(isset($_POST['UserEmailLogin']) && isset($_POST['UserPasswordLogin'])){
		$user = new user();
		$user->setUserEmail($_POST['UserEmailLogin']);
		$user->setUserPassword(sha1($_POST['UserPasswordLogin']));
		if($user->Userlogin()==true){
			$_SESSION['UserId']=$user->getUserId();
			$_SESSION['UserName']=$user->getUserName();
			$_SESSION['UserEmail']=$user->getUserEmail();
		}
	}
?>