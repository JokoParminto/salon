<?php
	include("../connection/connection.php");
	$error = "";
	if(isset($_POST))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Silahkan isi terlebih dahulu.";
		}else
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			$result = 0;
			if ($username == 'pemilik') {
				$sql="SELECT * FROM user_access WHERE user_access_username='$username' and user_access_password='$password'";

				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			} else {
				$sql="SELECT * FROM user_access WHERE user_access_username='$username' and user_access_password='$password'";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			}
			if (mysqli_num_rows($result) == 1 || mysqli_num_rows($result) == 0) {
				$_SESSION['is_logged_in'] = 1;
				if ($row['user_access_type'] == 'owner' || $row['user_access_type'] == 'admin' ) {
					$_SESSION['user_id'] =  $row['user_access_officer_id'];
				} else {
					$_SESSION['user_id'] =  $row['user_access_member_id'];					
				}
				$_SESSION['user_jabatan'] = $row['user_access_name'];
				$_SESSION['user_name'] = $row['user_access_name'];
				$_SESSION['level'] = $row['user_access_level'];
				if ($_SESSION['level'] == null) {
					header("location: index-login.php");
				} else if ($_SESSION['level'] == 2) {
					header("location: ../index.php");
				}else {
					header("location: home.php");
				}
			} else {
				$error = "Incorrect username or password.";
				header("location: index.php");				
			}
		}
	} else {
		$_SESSION ;
	}
?>