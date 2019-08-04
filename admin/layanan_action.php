<?php
	include("../connection/connection.php");
	// var_dump($_FILES['update_photo']['name']);exit;
	$service_id = $_POST['service_id']; 
	$service_name = $_POST['service_name'];
	$service_price = $_POST['service_price'];
	$service_desc = $_POST['service_desc'];
	$foto = $_FILES['service_photo']['name'];
	if ($foto !== '') {
		$tmp = $_FILES['service_photo']['tmp_name'];
		$fotobaru = date('dmYHis').$foto;
		$path = "images/".$fotobaru;
	}
	$id_service_delete	= isset($_GET['service_id']) ? $_GET['service_id'] : '';
	$today = date('Y-m-d H:i:s');
	$simpan = "true";
	$valid = "";
	$aksi = "";
	$upload = move_uploaded_file($tmp, $path);
	if ($_POST['service_id'] == '' && $id_service_delete == '') { 
		if($upload){
			$aksi = "Input";
			$sql = "INSERT INTO service 
				(
					service_name,
					service_desc,
					service_price,
					service_photo,
					service_created_at,
					service_updates_at
				) VALUES (
					'$service_name',
					'$service_desc',
					$service_price,
					'$fotobaru',
					'$today',
					'$today'
				)";
			} else {
				$_SESSION['pesan'] = 'Gagal Upload Gambar';
				header("location: layanan.php"); 
			}
		} else if ($_POST['service_id'] !== '' && $id_service_delete == '') {
			$aksi = "Update";
			if ($foto == '') {
				$sql = "UPDATE service SET 
					service_name='$service_name',
					service_price='$service_price',
					service_updates_at='$today'
				where service_id='$service_id'";
			} else {
				$sql = "UPDATE service SET 
					service_name='$service_name',
					service_price='$service_price',
					service_photo='$fotobaru',
					service_updates_at='$today'
				where service_id='$service_id'";
			}
		} else {
			$aksi = "Delete";
			$sql = "DELETE FROM service where service_id = '$id_service_delete'";
		}
		$service = mysqli_query($db, $sql);
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