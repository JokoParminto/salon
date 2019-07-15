<?php
	include("connection.php");
  $member_name = $_POST['member_name'];
  // print_r($member_name);exit();
	$member_address = $_POST['member_address'];
	$member_birthdate = $_POST['member_birthdate'];
	$member_phone = $_POST['member_phone'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$id_service_delete	= isset($_GET['service_id']) ? $_GET['service_id'] : '';
  $today = date('Y-m-d H:i:s');
  $reg_date = date('Y-m-d');
	$simpan = "true";
	$valid = "";
	$aksi = "";
  $sql = "INSERT INTO member 
  (
    member_name,
    member_address,
    member_birthdate,
    member_phone,
    member_created_at,
    member_updated_at
  ) VALUES (
    '$member_name',
    '$member_address',
    '$member_birthdate',
    '$member_phone',
    '$today',
    '$today'
  )";

$service = mysqli_query($db, $sql);
if ($service) {
  $last_id = $db->insert_id;
  $query = "INSERT INTO user_access 
  (
    user_access_member_id,
    user_access_name,
    user_access_address,
    user_access_birthdate,
    user_access_registration_date,
    user_access_phone,
    user_access_status,
    user_access_username,
    user_access_password,
    user_access_level,
    user_access_created_at,
    user_access_updated_at
  ) VALUES (
    $last_id,
    '$member_name',
    '$member_address',
    '$member_birthdate',
    '$reg_date',
    '$member_phone',
    'active',
    '$username',
    '$password',
    2,
    '$today',
    '$today'
  )";
  $user_access = mysqli_query($db, $query);
} 
	if(!$user_access){
		$simpan = "false";
	}else{
		$simpan = "true";
	}
	if($simpan=="true"){
		mysqli_commit($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.''.'Berhasil Dilakukan';
		header("location: register.php"); 
	}else{
		mysqli_rollback($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.' '.' Gagal Dilakukan';
		header("location: register.php"); 
	}
?>