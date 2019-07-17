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
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftarPemesan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Daftar Periksa Pasien</span></a> </li>						
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dataPetugas" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Daftar Petugas</span></a> </li>
							<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'tanggal-pesan'? 'active show' : '' ?>" data-toggle="tab" href="#laporanPesanPeriode" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Pemesanan Perperiode</span></a> </li>
							<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'tanggal-transaksi'? 'active show' : '' ?>" data-toggle="tab" href="#laporanTransaksiPerperiode" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Transaksi Perperiode</span></a> </li>
							<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#obat" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Daftar Obat</span></a> </li> -->
							<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pemeriksaan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Rekam Medis</span></a> </li> -->
							<!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'rawat-jalan'? 'active show' : '' ?>" data-toggle="tab" href="#rawatjalan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Rawat Jalan Perperiode</span></a> </li> -->
							<!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien'? 'active show' : '' ?>" data-toggle="tab" href="#laporanjumlahpasien" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Jumlah pasien Berdasrkan Umur</span></a> </li> -->
							<!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien-kelamin'? 'active show' : '' ?>" data-toggle="tab" href="#laporanjumlahpasienkelamin" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Jumlah pasien Berdasarkan Jenis Kelamin</span></a> </li>							 -->
							<!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-obat'? 'active show' : '' ?>" data-toggle="tab" href="#laporanjumlahobat" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Penggunaan Obat Perperiode</span></a> </li> -->
            	<!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'kode-pasien'? 'active show' : '' ?>" data-toggle="tab" href="#laporankodepasien" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Perpasien</span></a> </li> -->
	            <!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'banyak-penyakit'? 'active show' : '' ?>" data-toggle="tab" href="#laporandiagnosapenyakit" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Perpenyakit</span></a> </li>       -->
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
												echo "<th>" . $isi["member_birthdate"].  "</th>";
												echo "<th>" . $isi["member_phone"].  "</th>";
												echo "<th>" . $isi["member_created_at"] ."</th>";
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
                    <th>Layanan</th>
                    <!-- <th>Harga</th> -->
                    <th>Tanggal Pemesanan</th>
                    <th>Jam Pemesanan</th>
                    <th>Status Pemesanan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query="
											SELECT
                        reservation.*,
                        service.service_name,
                        service.service_price,
                        member.member_name
                      FROM reservation
                      LEFT JOIN service ON service.service_id = reservation.reservation_service_id
                      LEFT JOIN member ON  member.member_id = reservation.reservation_member_id
                      GROUP BY reservation.reservation_member_id
										";
										$data= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($data)) {
												echo "<tr>";
											echo "<th>" . $isi["reservation_id"].  "</th>";
												echo "<th>" . $isi["member_name"].  "</th>";
												echo "<th>" . $isi["service_name"].  "</th>";
												// echo "<th>" ."Rp"." ".$isi["service_price"]. "</th>";
												echo "<th>" . $isi["reservation_date"].  "</th>";
												echo "<th>" . $isi["reservation_time"].  "</th>";
												echo "<th>" . $isi["reservation_status"].  "</th>";
												echo "</tr>";
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
                    <!-- <th>Harga</th> -->
                    <th>Tanggal Lahir</th>
                    <th>Tanggal Menjadi Petugas</th>
                    <!-- <th>Status Pemesanan</th> -->
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
												// echo "<th>" ."Rp"." ".$isi["service_price"]. "</th>";
												echo "<th>" . $isi["officer_phone"].  "</th>";
												echo "<th>" . $isi["officer_birthdate"].  "</th>";
												echo "<th>" . $isi["officer_date_join"].  "</th>";
												// echo "<th>" . $isi["officer_date_join"].  "</th>";
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
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-dataPemesanan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
                      <th>#</th>  
											<th>Nama</th>
											<th>Layanan</th>
											<th>Harga</th>
											<th>Tanggal Pemesanan</th>
											<th>Jam Pemesanan</th>
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
                        reservation.*,
                        service.service_name,
                        service.service_price,
                        member.member_name
                      FROM reservation
                      LEFT JOIN service ON service.service_id = reservation.reservation_service_id
                      LEFT JOIN member ON  member.member_id = reservation.reservation_member_id
                      WHERE 0 = 0
                      $sql_query
                      GROUP BY reservation.reservation_id
										";
										$dataPemesanan= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPemesanan)) {
												echo "<tr>";
												echo "<th>" . $isi["reservation_id"].  "</th>";
												echo "<th>" . $isi["member_name"].  "</th>";
												echo "<th>" . $isi["service_name"].  "</th>";
												echo "<th>" ."Rp"." ".$isi["service_price"]. "</th>";
												echo "<th>" . $isi["reservation_date"].  "</th>";
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
									<button type="reset" class="btn btn-primary">reset</button>
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
                        echo "<th>" . $isi["reservation_date"].  "</th>";
                        echo "<th>" . $isi["reservation_status"].  "</th>";
                        echo "<th>" . $isi["transaction_created_at"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- <div class="tab-pane p-20" id="tenagaMedis" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-tenagaMedis" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama Tenaga Medis</th>
										<th>Jabatan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query="
											SELECT * 
											from Tenaga_Medis
											ORDER BY id_tenaga_medis ASC
										";
										$dataPasien= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPasien)) {
												echo "<tr>";
												echo "<th>" . $isi["nama_tenaga_medis"].  "</th>";
												echo "<th>" . $isi["jabatan"] ."</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
									</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20" id="obat" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-obat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Obat</th>
										<th>Jenis Obat</th>
										<th>Merk Obat</th>
										<th>Tanggal Kadaluarsa</th>
									</tr>
								</thead>
								<tbody>
									<?php
											$query="
												SELECT * 
												FROM Obat
												ORDER BY id_obat ASC
											";
											$dataObat= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataObat)) {
															echo "<tr>";
															echo "<th>" . $isi["id_obat"].  "</th>";
															echo "<th>" . $isi["nama_obat"].  "</th>";
															echo "<th>" . $isi["jenis_obat"].  "</th>";
															echo "<th>" . $isi["merk_obat"].  "</th>";
															echo "<th>" . $isi["tgl_kadaluarsa"].  "</th>";
															echo "</tr>";
													}
													echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20" id="pemeriksaan" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-obat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Pasien</th>
										<th>Alamat</th>
										<th>Jenis Kelamin</th>
										<th>Nomor Telepon</th>
										<th>Tanggal Daftar</th>
										<th>Pekerjaan</th>
										<th>Riwayat Alergi</th>
										<th>Umur</th>
										<th>Golongan Darah</th>
										<th>Riwayat Penyakit Keluarga</th>
										<th>Diagnosa</th>
										<th>Anamnesa</th>
										<th>Pemeriksaan Fisik</th>
										<th>Tindakan</th>
										<th>Rujukan</th>
									</tr>
								</thead>
								<tbody>
									<?php
											$query="
												SELECT 
													Rekam_Medis.*,
													Pasien.*,
													Tenaga_Medis.nama_tenaga_medis,
													Obat.*
												FROM Rekam_Medis  
												JOIN Pasien  ON Pasien.id_pasien = Rekam_Medis.id_pasien
												JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = Rekam_Medis.id_tenaga_medis
												JOIN Obat ON Obat.id_obat = Rekam_Medis.id_obat
											";
											$dataObat= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataObat)) {
															echo "<tr>";
															echo "<th>" . $isi["id_pasien"].  "</th>";
															echo "<th>" . $isi["nama_pasien"].  "</th>";
															echo "<th>" . $isi["alamat"].  "</th>";
															echo "<th>" . $isi["jenis_kelamin"].  "</th>";
															echo "<th>" . $isi["no_telepon"].  "</th>";
															echo "<th>" . $isi["tgl_daftar"].  "</th>";
															echo "<th>" . $isi["pekerjaan"].  "</th>";	
															echo "<th>" . $isi["riwayat_alergi"].  "</th>";
															echo "<th>" . $isi["umur"].  "</th>";
															echo "<th>" . $isi["golongan_darah"].  "</th>";
															echo "<th>" . $isi["penyakit_riwayat_keluarga"].  "</th>";
															echo "<th>" . $isi["diagnosa"].  "</th>";
															echo "<th>" . $isi["anamnesa"].  "</th>";
															echo "<th>" . $isi["pemeriksaan_fisik"].  "</th>";
															echo "<th>" . $isi["tindakan"].  "</th>";
															echo "<th>" . $isi["status_rujuk"].  "</th>";
															echo "</tr>";
													}
													echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'rawat-jalan' ? 'active show' : '' ?>" id="rawatjalan" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Tanggal Periksa</label>
								<input type="month" class="form-control" name="tgl_periksa" placeholder="mm/yyyy" id="tgl-periksa" value="<?=isset($_GET['startdate']) ? $_GET['startdate'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporan" data-laporan="rawat-jalan"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-rawatjalan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama Pasien</th>
										<th>Nama Tenaga Medis</th>
										<th>Diagnosa</th>
										<th>Status Periksa</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
										$parsing = substr($startdate, 5,2);
										$query="
											SELECT 
												Rekam_Medis.*,
												Pasien.*,
												Tenaga_Medis.*
											FROM  Rekam_Medis
											JOIN Pasien ON Pasien.id_pasien = Rekam_Medis.id_pasien
											JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = Rekam_Medis.id_tenaga_medis
											WHERE MONTH(Rekam_Medis.tgl_rekam_medis) = '$parsing'
											AND Rekam_Medis.status_rawat = 'rawat-jalan'
											GROUP BY Rekam_Medis.id_pasien 
										";
										$dataPerPenyakit= mysqli_query($db, $query);

										while ($isi = mysqli_fetch_assoc($dataPerPenyakit)) {
												echo "<tr>";
												echo "<th>" . $isi["nama_pasien"].  "</th>";
												echo "<th>" . $isi["nama_tenaga_medis"].  "</th>";
												echo "<th>" . $isi["diagnosa"].  "</th>";
												echo "<th>" . $isi["status_rawat"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien' ? 'active show' : '' ?>" id="laporanjumlahpasien" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">Jenjang Usia</label>
								<select class="form-control" name="jenis_kelamin" id="umur" value="<?=isset($_GET['umur']) ? $_GET['umur'] : ''?>" >
									<option value="">==================</option>
									<option value="balita">Balita (1-5 tahun)</option>
									<option value="anak">Anak-anak (6-12 tahun)</option>
									<option value="remaja">Remaja (13-21 tahun)</option>
									<option value="dewasa">Dewasa (29 tahun keatas)</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporanumur" data="jumlah-pasien"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Banyak Pasien</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$umur = isset($_GET['umur']) ? $_GET['umur'] : '';
										$sql = '';
										if (!empty($umur)) {
											if ($umur == "balita") {
												$sql = "AND Pasien.umur BETWEEN 0 AND 5";
											} else if ($umur == "anak") {
												$sql = "AND Pasien.umur BETWEEN 6 AND 12";
											} else if ($umur == "remaja") {
												$sql = "AND Pasien.umur BETWEEN 13 AND 21";
											} else {
												$sql = "AND Pasien.umur BETWEEN 22 AND 100";
											}
										} else {
											$sql = '';
										} 
										$query="
											SELECT 
												COUNT(DISTINCT Rekam_Medis.id_pasien) as total
											FROM  Rekam_Medis
											JOIN Pasien ON Pasien.id_pasien = Rekam_Medis.id_pasien
											WHERE 0 = 0
											$sql 
										";
										$dataPerAlamat= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerAlamat)) {
												echo "<tr>";
												echo "<th>" . $isi["total"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien-kelamin' ? 'active show' : '' ?>" id="laporanjumlahpasienkelamin" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" id="jeniskelamin" value="<?=isset($_GET['jeniskelamin']) ? $_GET['jeniskelamin'] : ''?>" >
									<option value="">==================</option>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporankelamin" data="jumlah-pasien-kelamin"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Banyak Pasien</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$jk = isset($_GET['jeniskelamin']) ? $_GET['jeniskelamin'] : '';
										$query="
											SELECT 
												COUNT(DISTINCT Rekam_Medis.id_pasien) as total
											FROM  Rekam_Medis
											JOIN Pasien ON Pasien.id_pasien = Rekam_Medis.id_pasien
											WHERE 0 = 0
											AND Pasien.jenis_kelamin = '$jk'
										";
										$dataPerAlamat= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerAlamat)) {
												echo "<tr>";
												echo "<th>" . $isi["total"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-obat' ? 'active show' : '' ?>" id="laporanjumlahobat" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Periode</label>
								<input type="month" class="form-control" name="tgl_obat" placeholder="dd/mm/yyyy" id="tgl-obat" value="<?=isset($_GET['tglobat']) ? $_GET['tglobat'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporanobat" data="jumlah-obat"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahobat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Obat</th>
										<th>Jumlah Obat</th>
										<th>Tanggal Periksa</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$startdate = isset($_GET['tglobat']) ? $_GET['tglobat'] : '';
										$parsing = substr($startdate, 5,2);
										$query="
											SELECT 
												Rekam_Medis.*,
												Obat.*,
												Resep_Obat.*
											FROM  Rekam_Medis
											JOIN Obat ON Obat.id_obat = Rekam_Medis.id_obat
											LEFT JOIN Resep_Obat ON Resep_Obat.id_rekam_medis = Rekam_Medis.id_rekam_medis
											WHERE MONTH(Rekam_Medis.tgl_rekam_medis) = '$parsing'
											GROUP BY Rekam_Medis.id_rekam_medis 
										";
										$dataPerUmur= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerUmur)) {
												echo "<tr>";
												echo "<th>" . $isi["id_resep"].  "</th>";
												echo "<th>" . $isi["nama_obat"].  "</th>";
												echo "<th>" . $isi["jml_obat"].  "</th>";
												echo "<th>" . $isi["tgl_rekam_medis"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'kode-pasien' ? 'active show' : '' ?>" id="laporankodepasien" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">Pasien</label>
								<select class="form-control" name="id-pasien" id="id-pasien"  value="<?=isset($_GET['idpasien']) ? $_GET['idpasien'] : ''?>" >
									<option value="">==================</option>
										<?php
											$query = ("select * from Pasien");
											$connect = mysqli_query($db, $query);
											while ($data = mysqli_fetch_assoc($connect)){
											echo "<option value='{$data['id_pasien']}'>{$data['nama_pasien']}-{$data['id_pasien']}</option>";}?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporankode" data="kode-pasien"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
										<tr>
											<th>Nama Pasien</th>
											<th>Tenaga Medis</th>
											<th>Diagnosa</th>
											<th>Alamat</th>
											<th>Tanggal Daftar</th>
											<th>Tanggal Pengambilan</th>
											<th>Catatan</th>
										</tr>
								</thead>
								<tbody>
									<?php
										$id_pasien = isset($_GET['idpasien']) ? $_GET['idpasien'] : '';
											$query="
												SELECT 
													Rekam_Medis.*,
													Pasien.*,
													Tenaga_Medis.*,
													Obat.*,
													Resep_Obat.*
												FROM rekam_medis  
												JOIN Pasien  ON Pasien.id_pasien = Rekam_Medis.id_pasien
												JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = Rekam_Medis.id_tenaga_medis
												JOIN Obat ON Obat.id_obat = Rekam_Medis.id_obat
												LEFT JOIN Resep_Obat ON Resep_Obat.id_rekam_medis = Rekam_Medis.id_rekam_medis
												WHERE Rekam_Medis.id_pasien = '$id_pasien'
												GROUP BY rekam_medis.id_pasien
											";
											$dataPasien= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataPasien)) {
													echo "<tr>";
													echo "<th>" . $isi["nama_pasien"]."</th>";
													echo "<th>" . $isi["nama_tenaga_medis"]."</th>";
													echo "<th>" . $isi["diagnosa"]."</th>";
													echo "<th>" . $isi["alamat"].  "</th>";
													echo "<th>" . $isi["tgl_daftar"]."</th>";
													echo "<th>" . $isi["tanggal_pengambilan"]."</th>";
													echo "<th>" . $isi["catatan"]."</th>";
													echo "</tr>";
												}
												echo "</table>";
										?>
								</tbody>
							</table>
						</div>
					</div> -->
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'banyak-penyakit' ? 'active show' : '' ?>" id="laporandiagnosapenyakit" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">Pilih Penyakit</label>
								<select class="form-control" name="jenis_penyakit" id="diagnosa-penyakit" value="<?=isset($_GET['penyakit']) ? $_GET['penyakit'] : ''?>" >
									<option value="">==================</option>
									<option value="gejala_db">Gejala Demam Berdarah</option>
									<option value="asma">Asma</option>
									<option value="diare">Diare</option>
									<option value="diabetes">Diabetes</option>
									<option value="vertigo">Vertigo</option>
									<option value="hipertensi">Hipertensi</option>
									<option value="hipotensi">Hipotensi</option>
									<option value="batuk">Batuk</option>
									<option value="influenza">Influenza</option>
									<option value="demam">Demam</option>
									<option value="lainnya">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadpenyakit" data="banyak-penyakit"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporandiagnosapenyakit" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Jenis Penyakit</th>
										<th>Banyak Pasien</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$penyakit = isset($_GET['penyakit']) ? $_GET['penyakit'] : '';
										$query="
											SELECT COUNT(id_rekam_medis) AS total
											FROM rekam_medis
											WHERE diagnosa_penyakit LIKE '%$penyakit%'
										";
										$dataPerAlamat= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerAlamat)) {
												echo "<tr>";
												echo "<th>" . $penyakit.  "</th>";
												echo "<th>" . $isi["total"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div> -->
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
