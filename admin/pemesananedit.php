<?php
	include("header-admin.php");

	$reservation_id = isset($_GET['reservation_id']) ? $_GET['reservation_id'] : '';
    $query="SELECT
      reservation.*,
      service.service_name,
      service.service_price,
      member.member_name
      FROM reservation
      LEFT JOIN service ON service.service_id = reservation.reservation_service_id
      LEFT JOIN member ON  member.member_id = reservation.reservation_member_id 
      WHERE reservation_id= '$reservation_id'";
    $hasil= mysqli_query($db, $query);
		$isi = mysqli_fetch_assoc($hasil);
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
					<h4 class="card-title">Data Pemesan</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Ubah Pemesanan</span></a> </li>
						<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Pemesanan</span></a> </li> -->
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="p-20">
								<div class="basic-form">
									<form action="../pesan/pemesanan_action.php" method="post">
										<input type="hidden" class="form-control" name="reservation_id" id="reservation_id" value="<?= $isi['reservation_id'];?>">
										<div class="form-group">
											<label for="">Nama Pelanggan</label>
											<input type="text" class="form-control" name="member_name" id="member_name" value="<?=$isi['member_name']?>"</readonly>
										</div>
                    <div class="form-group">
											<label for="">Nama Layanan</label>
											<input type="text" class="form-control" name="service_name" id="service_name" value="<?=$isi['service_name']?>"</readonly>
										</div>
										<div class="form-group">
											<label for="">Harga</label>
											  <input type="number" name="service_price" class="form-control" cols="30" rows="10" id="service_price" value="<?=$isi['service_price']?>"</readonly>
										</div>
                    <div class="form-group">
											<label for="">Tanggal Pesan</label>
											  <input type="text" name="service_price" class="form-control" cols="30" rows="10" id="reservation_date" value="<?=$isi['reservation_date']?>"</readonly>
										</div>
                    <div class="form-group">
											<label for="">Status Pesan</label>
											<select class="form-control" name="reservation_status" required="" id="reservation_status">
												<!-- <option value="">Pilih Status</option> -->
												<option value="confirmed" >Confirmed</option>
												<option value="ok" >Ok</option>
												<option value="close" >Close</option>
												<option value="cancel" >Cancel</option>
											</select>
										</div>
										<button type="submit" class="btn btn-default">Submit</button>         
									</form>
								</div>
							</div>
						</div>
						<!-- <div class="tab-pane p-20" id="daftar" role="tabpanel">
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
						</div> -->
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