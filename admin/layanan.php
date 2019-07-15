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
									<form action="layanan_action.php" method="post"  enctype="multipart/form-data">
										<!-- <input type="hidden" class="form-control" name="id_pasien" id="id_pasien"> -->
										<div class="form-group">
											<label for="">Nama Layanan</label>
											<input type="text" class="form-control" name="service_name" placeholder="Nama Layanan" id="service_name">
										</div>
                    <div class="form-group">
											<label for="">Harga</label>
											<input type="number" class="form-control" name="service_price" placeholder="Harga" id="service_price">
										</div>
										<div class="form-group">
											<label for="">Deskripsi</label>
											<textarea name="service_desc" class="form-control" id="service_desc" ></textarea>
											<!-- <input type="number" class="form-control" name="service_price" placeholder="Harga" id="service_price"> -->
										</div>
										<div class="form-group">
											<label for="">Upload Gambar</label>
											<input type="file" class="form-control" name="service_photo" value="service_photo" id="service_photo">
										</div>
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
											<th>Deskripsi</th>
											<th>Gambar</th>
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
													echo "<th>" . $isi["service_desc"].  "</th>";
													echo "<th>" .  "<img src='images/".$isi["service_photo"]."' width='100px' height='100px'/>"."</th>";
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
