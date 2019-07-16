<?php
  include("../connection/connection.php");
  $id_petugas = $_SESSION['user_id'];
  $reservation_id = $_POST['reservation_id'];
  $transaction_status = $_POST['transaction_status'];
  $reservation_status = $_POST['reservation_status'];
  // var_dump($reservation_status);exit();
  
	$today = date('Y-m-d H:i:s');
	$simpan = "true";
	$valid = "";
	$aksi = "";
  if ($reservation_status == 'ok') {
    $aksi = "Input"; 
    $sql = "INSERT INTO transaction 
    (
      transaction_reservation_id,
      transaction_officer_id,
      transaction_status,
      transaction_created_at,
      transaction_updated_at
    ) VALUES (
      $reservation_id,
      $id_petugas,
      '$transaction_status',
      '$today',
      '$today'
    )";
    $service = mysqli_query($db, $sql);
    if ($service) {
      $query = "UPDATE reservation SET 
      reservation_status = 'close'
      where reservation_id='$reservation_id'";
      $update = mysqli_query($db, $query);
    }
  } else {
    $aksi = "Update";
    $sql = "UPDATE transaction SET 
      transaction_status='$transaction_status'
      where transaction_reservation_id='$reservation_id'";
    $service = mysqli_query($db, $sql);
  }
  if(!$service){
  $simpan = "false";
  }else{
    $simpan = "true";
  }
  if($simpan=="true"){
    mysqli_commit($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.'Berhasil Dilakukan';
    header("location: transaksi.php"); 
  } else{
    mysqli_rollback($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.' Gagal Dilakukan';
    header("location: ../pemesanan.php"); 
  } 
?>