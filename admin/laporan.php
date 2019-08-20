<?php
	include("header-admin.php");
?>
<!-- Container fluid  -->
<div class="container-fluid">
    <?php
        if (!empty($_SESSION['pesan'])) {
            echo "<div class='alert alert-primary alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span></button>";
            echo $_SESSION['pesan'];
            echo "</div>";
        }
        unset($_SESSION['pesan']);
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan</h4>
            <!-- Nav tabs -->
            
        </div>
        <div class="">
					<ul class="nav nav-tabs tabs-vertical" role="tablist">
							<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" data-toggle="tab" href="#daftaMember" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Laporan Daftar Member</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftarPemesan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Daftar Pemesan</span></a> </li>						
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dataPetugas" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Daftar Petugas</span></a> </li>
							<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'tanggal-pesan'? 'active show' : '' ?>" data-toggle="tab" href="#laporanPesanPeriode" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Pemesanan Perperiode</span></a> </li>
							<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'tanggal-transaksi'? 'active show' : '' ?>" data-toggle="tab" href="#laporanTransaksiPerperiode" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Transaksi Perperiode</span></a> </li>
					</ul>
					<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" id="daftaMember" role="tabpanel">
						<div class="p-20">
							<div class="table-responsive">
								<table id="datatable-daftarMember" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Member</th>
											<th>Alamat</th>
											<th>Tanggal Lahir</th>
											<th>Nomor Telepon</th>
											<th>Tanggal Daftar</th>
										</tr>
									</thead>
									<tbody>
									<?php
											$query="SELECT * 
												FROM member
												ORDER BY member_id ASC
                      ";
                      // var_dump($query);exit();
											$datadata= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($datadata)) {
												echo "<tr>";
												echo "<th>" . $isi["member_id"].  "</th>";
												echo "<th>" . $isi["member_name"].  "</th>";
												echo "<th>" . $isi["member_address"] ."</th>";												
												echo "<th>" . date('F j, Y',strtotime($isi["member_birthdate"])).  "</th>";
												echo "<th>" . $isi["member_phone"].  "</th>";
												echo "<th>" . date('F j, Y H:i',strtotime($isi["member_created_at"]))."</th>";
												echo "</tr>";
											}
												echo "</table>";
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane p-20" id="daftarPemesan" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-tenagaMedis" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>  
										<th>Nama</th>
										<th>Tanggal Pemesanan</th>
										<th>Layanan</th>
                    <th>Harga</th>
										<th>Status Pemesanan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query="
										SELECT
											transaction.*,
											transaction_detail.*,
											service.*,
											member.*
										FROM transaction 
										JOIN transaction_detail ON transaction_detail.transaction_detail_transaction_id = transaction.transaction_id
										JOIN service ON service.service_id = transaction_detail.transaction_detail_service_id
										JOIN member ON member.member_id = transaction.transaction_member_id
										";
										$i=1;
										$data= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($data)) {
												echo "<tr>";
													echo "<th>" . $i++.  "</th>";
													echo "<th>" . $isi["member_name"].  "</th>";
													echo "<th>" . $isi["transaction_date"].  "</th>";
													echo "<th>" . $isi["service_name"].  "</th>";
													echo "<th>" ."Rp"." ".$isi["service_price"].  "</th>";
													echo "<th>" . $isi["transaction_status"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
									</tbody>
							</table>
						</div>
					</div>
          <div class="tab-pane p-20" id="dataPetugas" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-dataPetugas" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>  
                    <th>Nama Petugas</th>
                    <th>Alamat</th>
                    <th>Nomor Handphone</th>
                    <th>Tanggal Lahir</th>
                    <th>Tanggal Menjadi Petugas</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query="SELECT * 
                      FROM officer
                      WHERE officer_name <> 'pemilik'
										";
										$data= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($data)) {
                      echo "<tr>";
											  echo "<th>" . $isi["officer_id"].  "</th>";
												echo "<th>" . $isi["officer_name"].  "</th>";
												echo "<th>" . $isi["officer_address"].  "</th>";
												echo "<th>" . $isi["officer_phone"].  "</th>";
												echo "<th>" . date('F j, Y',strtotime($isi["officer_birthdate"])).  "</th>";
												echo "<th>" . date('F j, Y',strtotime($isi["officer_date_join"])).  "</th>";
												echo "</tr>";
                      echo "</tr>";
                    }
											echo "</table>";
									?>
									</tbody>
							</table>
						</div>
					</div>
          <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'tanggal-pesan' ? 'active show' : '' ?>" id="laporanPesanPeriode" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Pilih Bulan</label>
								<input type="month" class="form-control" name="tgl_periksa" placeholder="dd/mm/yyyy" id="tgl" value="<?=isset($_GET['bulan']) ? $_GET['bulan'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadLaporanPesan" data="tanggal-pesan"/>
									<!-- <button type="reset" class="btn btn-primary">reset</button> -->
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-dataPemesanan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>  
										<th>Nama</th>
										<th>Tanggal Pemesanan</th>
										<th>Layanan</th>
										<th>Harga</th>
										<th>Status Pemesanan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql_query = '';
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
										$parsing = substr($bulan, 5,2);
										if ($parsing != null) {
											$sql_query = "AND MONTH(reservation.reservation_date) = '$parsing'";
										}
										$query="
											SELECT
												transaction.*,
												transaction_detail.*,
												service.*,
												member.*
											FROM transaction 
											JOIN transaction_detail ON transaction_detail.transaction_detail_transaction_id = transaction.transaction_id
											JOIN service ON service.service_id = transaction_detail.transaction_detail_service_id
											JOIN member ON member.member_id = transaction.transaction_member_id
                      WHERE 0 = 0
											$sql_query
											AND (reservation.reservation_status = 'cancel' OR reservation.reservation_status = 'confirmed') 
                      GROUP BY reservation.reservation_id
										";
										$dataPemesanan= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPemesanan)) {
												echo "<tr>";
												echo "<th>" . $isi["reservation_id"].  "</th>";
												echo "<th>" . $isi["member_name"].  "</th>";
												echo "<th>" . $isi["service_name"].  "</th>";
												echo "<th>" ."Rp"." ".$isi["service_price"]. "</th>";
												echo "<th>" . date('F j, Y',strtotime($isi["reservation_date"])).  "</th>";
												echo "<th>" . $isi["reservation_time"].  "</th>";
												echo "<th>" . $isi["reservation_status"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
          <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'tanggal-transaksi' ? 'active show' : '' ?>" id="laporanTransaksiPerperiode" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Pilih Bulan</label>
								<input type="month" class="form-control" name="tgl_periksa" placeholder="dd/mm/yyyy" id="bulan" value="<?=isset($_GET['bulan-transaksi']) ? $_GET['bulan-transaksi'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadLaporanTransaksi" data="tanggal-transaksi"/>
									<!-- <button type="reset" class="btn btn-primary">reset</button> -->
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-transaksi" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
                      <th>#</th>  
											<th>Nama</th>
											<th>Layanan</th>
											<th>Harga</th>
											<th>Tanggal Pemesanan</th>
											<th>Status Pemesanan</th>
											<th>tanggal Transaksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql_query = '';
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$bulan = isset($_GET['bulan-transaksi']) ? $_GET['bulan-transaksi'] : '';
										$parsing = substr($bulan, 5,2);
										if ($parsing != null) {
											$sql_query = "AND MONTH(transaction.transaction_created_at) = '$parsing'";
										}
										$query="
											SELECT *  
                      FROM transaction
                      JOIN reservation ON reservation.reservation_id = transaction.transaction_reservation_id
                      LEFT JOIN service ON service.service_id = reservation.reservation_service_id
                      LEFT JOIN member ON  member.member_id = reservation.reservation_member_id
                      WHERE 0 = 0
                      $sql_query
                      GROUP BY transaction.transaction_id
										";
										$dataTransaksi= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataTransaksi)) {
												echo "<tr>";
												echo "<th>" . $isi["transaction_id"].  "</th>";
												echo "<th>" . $isi["member_name"].  "</th>";
                        echo "<th>" . $isi["service_name"].  "</th>";
                        echo "<th>" . $isi["service_price"].  "</th>";
                        echo "<th>" . date('F j, Y',strtotime($isi["reservation_date"])).  "</th>";
                        echo "<th>" . $isi["reservation_status"].  "</th>";
                        echo "<th>" . date('F j, Y H:i',strtotime($isi["transaction_created_at"])).  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
    </div>
</div>
</div>
</div>
<!-- End Page wrapper  -->
</div>
</body>
<!-- End Wrapper -->
<script>
$(document).ready(function() {
	$('.table').DataTable({
		'dom': 'Bfrtip',
		'buttons': ['copy', 'csv', 'excel', 'pdf', 'print']
		});
	});
	$('#reloadlaporan').on('click', function(){
		console.log('a');
		window.location.href = 'laporan.php?typelaporan='+$(this).attr('data-laporan')+'&startdate='+$('#tgl-periksa').val();
	});
	$('#reloadLaporanPesan').on('click', function(){
		console.log('a');
		window.location.href = 'laporan.php?typelaporan='+$(this).attr('data')+'&bulan='+$('#tgl').val();
	});
  $('#reloadLaporanTransaksi').on('click', function(){
		console.log('a');
		window.location.href = 'laporan.php?typelaporan='+$(this).attr('data')+'&bulan-transaksi='+$('#bulan').val();
	});
</script>
</html>
