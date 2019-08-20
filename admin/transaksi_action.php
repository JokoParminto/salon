<?php
	include("../connection/connection.php");  
  $transaction_id = null;
  $transaction_status = '';
  $member_id = $_SESSION['user_id'];
  if (!empty($_POST['transaction_id'])) {
    $transaction_id = $_POST['transaction_id'];
  }
  if (!empty($_POST['transaction_status'])) {
    $transaction_status = $_POST['transaction_status'];
  }
  $implode_checkbox =  implode(", ",$_POST['layanan']);
	$aksi = "";
  if (!empty($transaction_id) ) {
    $aksi = "Update";
    $sql = "UPDATE transaction SET 
      transaction_status='$transaction_status'
      where transaction_id='$transaction_id'";
      // var_dump($sql);exit;
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
    header("location: transaksi.php"); 
  } else if ($simpan=="true" && $aksi == 'Update') {
    mysqli_commit($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.'Berhasil Dilakukan';
    header("location: transaksi.php"); 
  }else{
    mysqli_rollback($db);
    $_SESSION['pesan'] = 'Proses '.$aksi.' '.' Gagal Dilakukan';
    header("location: transaksi.php"); 
  } 
?>