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
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Data Layanan</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tambah Layanan</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Layanan</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="p-20">
								<div class="basic-form">
									<form action="layanan_action.php" method="post">
										<!-- <input type="hidden" class="form-control" name="id_pasien" id="id_pasien"> -->
										<div class="form-group">
											<label for="">Nama Layanan</label>
											<input type="text" class="form-control" name="service_name" placeholder="Nama Layanan" id="service_name">
										</div>
                    <div class="form-group">
											<label for="">Harga</label>
											<input type="number" class="form-control" name="service_price" placeholder="Harga" id="service_price">
										</div>
										<!-- <div class="row">
											<div class="col-md-4 form-group">
												<label for="">Jenis Kelamin</label>
												<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
													<option value="laki-laki">Laki-Laki</option>
													<option value="perempuan">Perempuan</option>
												</select>
											</div>
											<div class="col-md-4  form-group">
												<label for="">Tanggal Lahir</label>
												<input type="date" class="form-control" name="tanggal_lahir" placeholder="dd/mm/yyyy" id="tanggal_lahir">
											</div>
										</div>
										<div class="form-group">
											<label for="">No Telepon</label>
											<input type="number" class="form-control" name="no_telepon" placeholder="Nomor Telepon" id="no_telepon">
										</div>
										<div class="col-md-4  form-group">
											<label for="">Tanggal Daftar</label>
											<input type="date" class="form-control" name="tgl_daftar" placeholder="dd/mm/yyyy" id="tgl_daftar">
										</div>
										<div class="form-group">
											<label for="">Pekerjaan</label>
											<input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan Pasien" id="pekerjaan">
										</div>
										<div class="form-group">
											<label for="">Riwayat Alergi</label>
											<input type="text" class="form-control" name="riwayat_alergi" placeholder="Riwayat Alergi" id="riwayat_alergi">
										</div>
										<div class="form-group">
											<label for="">Umur Pasien</label>
											<input type="number" name="umur" class="form-control" cols="30" rows="10" id="umur"></textarea>
										</div>
										<div class="col-md-4 form-group">
											<label for="">Golongan Darah</label>
												<select class="form-control" name="golongan_darah" id="golongan_darah">
													<option value="O">O</option>
													<option value="A">A</option>
													<option value="AB">AB</option>
													<option value="B">B</option>
												</select>
										</div>
										<div class="form-group">
											<label for="">Kepala Keluarga</label>
											<input type="text" class="form-control" name="kepala_keluarga" placeholder="Kepala Keluarga" id="kepala_keluarga">
										</div>
										<div class="col-md-4 form-group">
											<label for="">Status</label>
											<select class="form-control" name="status" id="status">
												<option value="BPJS">BPJS</option>
												<option value="ASKES">ASKES</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Penyakit Riwayat Keluarga</label>
											<input type="text" class="form-control" name="penyakit_riwayat_keluarga" placeholder="Penyakit Riwayat Keluarga" id="penyakit_riwayat_keluarga">
										</div> -->
										<button type="submit" class="btn btn-default">Submit</button>         
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="daftar" role="tabpanel">
							<div class="table-responsive m-t-40">
								<table id="datatable-pasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Layanan</th>
											<th>Harga</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query="select * from service ";
											$dataPasien= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataPasien)) {
													echo "<tr>";
													echo "<th>" . $isi["service_name"].  "</th>";
													echo "<th>" . $isi["service_price"].  "</th>";
													echo "<th><a href='layananedit.php?service_id=".$isi['service_id']."'>Edit</a> || <a href='layanan_action.php?service_id=".$isi['service_id']."&service_name=".$isi['service_name']."'>Delete</a></th>";
													echo "</tr>";
												}
												echo "</table>";
											$db->close();
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

</div>
</div>
<!-- End Page wrapper  -->
</div>
</body>
<!-- End Wrapper -->

</html>
