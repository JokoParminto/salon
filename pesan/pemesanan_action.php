<?php
  include("../connection/connection.php");
  $member_id = $_SESSION['user_id'];
  $id_layanan = $_POST['layanan'];
  $reservation_id = $_POST['reservation_id'];
  $status_pesan = $_POST['reservation_status'];
  $implode_checkbox =  implode(", ",$_POST['layanan']);
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
  $menit = $_POST['menit'];
  $time = $jam.":".$menit.":00";
	$id_reservation_delete	= isset($_GET['reservation_id']) ? $_GET['reservation_id'] : '';
	$today = date('Y-m-d H:i:s');
	$simpan = "true";
	$valid = "";
	$aksi = "";
  if ($id_layanan !== null) {
    $aksi = "Input"; 
    foreach ($id_layanan as $key => $value) {
      $sql = "INSERT INTO reservation 
      (
        reservation_member_id,
        reservation_service_id,
        reservation_date,
        reservation_time,
        reservation_status,
        reservation_created_at,
        reservation_updated_at
      ) VALUES (
        $member_id,
        $id_layanan[$key],
        '$tanggal',
        '$time',
        'confirmed',
        '$today',
        '$today'
      )";
      $service = mysqli_query($db, $sql);
    } 
  } else {
    $aksi = "Update";
    $sql = "UPDATE reservation SET 
      reservation_status='$status_pesan'
      where reservation_id='$reservation_id'";
    $service = mysqli_query($db, $sql);
  }
  if(!$service){
  $simpan = "false";
  }else{
    $simpan = "true";
  }
  if($simpan=="true" && $aksi == 'Input'){
    mysqli_commit($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.'Berhasil Dilakukan';
    header("location: ../pemesanan.php"); 
  } else if ($simpan=="true" && $aksi == 'Update') {
    mysqli_commit($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.'Berhasil Dilakukan';
    header("location: ../admin/daftar_pemesan.php"); 
  }else{
    mysqli_rollback($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.' Gagal Dilakukan';
    header("location: ../pemesanan.php"); 
  } 
?>