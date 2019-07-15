<?php
	include("connection.php");
	$service_id = $_POST['service_id']; 
	$service_name = $_POST['service_name'];
	$service_price = $_POST['service_price'];
	$id_service_delete	= isset($_GET['service_id']) ? $_GET['service_id'] : '';
	$today = date('Y-m-d H:i:s');
	$simpan = "true";
	$valid = "";
	$aksi = "";
	if ($_POST['service_id'] == '' && $id_service_delete == '') {
		$aksi = "Input";
		$sql = "INSERT INTO service 
      (
        service_name,
        service_price,
        service_created_at,
        service_updates_at
      ) VALUES (
        '$service_name',
        $service_price,
        '$today',
        '$today'
        )";
  } else if ($_POST['service_id'] !== '' && $id_service_delete == '') {
		$aksi = "Update";
		$sql = "UPDATE service SET 
      service_name='$service_name',
      service_price='$service_price',
      service_updates_at='$today'
    where service_id='$service_id'";
	} else {
		$aksi = "Delete";
		$sql = "DELETE FROM service where service_id = '$id_service_delete'";
	} 
  $service = mysqli_query($db, $sql);
  // print_r($service);exit();
	if(!$service){
		$simpan = "false";
	}else{
		$simpan = "true";
	}
	if($simpan=="true"){
		mysqli_commit($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.''.'Berhasil Dilakukan';
		header("location: layanan.php"); 
	}else{
		mysqli_rollback($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.' '.' Gagal Dilakukan';
		header("location: layanan.php"); 
	}
?>