<?php
  include("../connection/connection.php");
  $transaction_id = null;
  $transaction_status = '';
  $member_id = $_SESSION['user_id'];
  $id_layanan = $_POST['layanan'];
  if (!empty($_POST['transaction_id'])) {
    $transaction_id = $_POST['transaction_id'];
  }
  if (!empty($_POST['transaction_status'])) {
    $transaction_status = $_POST['transaction_status'];
  }
  $implode_checkbox =  implode(", ",$_POST['layanan']);
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
  $menit = $_POST['menit'];
  $time = $jam.":".$menit.":00";
  $tanggal_ok = $tanggal.' '.$time;
	// $id_reservation_delete	= isset($_GET['reservation_id']) ? $_GET['reservation_id'] : '';
	$today = date('Y-m-d H:i:s');
	$simpan = "true";
	$valid = "";
	$aksi = "";
  if (!empty($id_layanan) && $transaction_id == null) {
    $aksi = "Input"; 
    // foreach ($id_layanan as $key => $value) {
      $sql = "INSERT INTO transaction 
      (
        transaction_member_id,
        transaction_officer_id,
        transaction_status,
        transaction_date,
        transaction_created_at,
        transaction_updated_at
      ) VALUES (
        $member_id,
        2,
        'confirmed',
        '$tanggal_ok',
        '$today',
        '$today'
      )";
      // var_dump($sql);exit;
      $service = mysqli_query($db, $sql);
      $latest_id_transaction = $db->insert_id;
      if ($service) {
       	foreach ($id_layanan as $key => $value) {
          if ($id_layanan[$key] !== '') {
            $query="
              SELECT service_price
              FROM service  
              WHERE service.service_id = ".$id_layanan[$key]."";
            $dataService= mysqli_query($db, $query);
            $isi=mysqli_fetch_assoc($dataService);
            $price = $isi['service_price'];
            $sql = "INSERT INTO transaction_detail 
            (
              transaction_detail_transaction_id,
              transaction_detail_service_id,
              transaction_detail_total_price,
              transaction_detail_created_at,
              transaction_detail_updated_at
            ) VALUES (
              $latest_id_transaction,
              $id_layanan[$key],
              '$price',
              '$today',
              '$today'
            )";
          $detail_transaction = mysqli_query($db, $sql);
				}
      }
    }
  } else {
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