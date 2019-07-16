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
					<h4 class="card-title">Data Pemesan</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Data Pemesan</span></a> </li>
						<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Layanan</span></a> </li> -->
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="table-responsive m-t-40">
								<table id="datatable-pasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Layanan</th>
											<th>Harga</th>
											<th>Tanggal Pemesanan</th>
											<th>Status Pemesanan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
                      $query="SELECT
                        reservation.*,
                        service.service_name,
                        service.service_price,
                        member.member_name
                      FROM reservation
                      LEFT JOIN service ON service.service_id = reservation.reservation_service_id
                      LEFT JOIN member ON  member.member_id = reservation.reservation_member_id
                      GROUP BY reservation.reservation_id
                      ";
											$dataTransaction= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataTransaction)) {
													echo "<tr>";
													echo "<th>" . $isi["member_name"].  "</th>";
													echo "<th>" . $isi["service_name"].  "</th>";
													echo "<th>" ."Rp"." ".$isi["service_price"].  "</th>";
													echo "<th>" . $isi["reservation_date"].  "</th>";
													echo "<th>" . $isi["reservation_status"].  "</th>";
													echo "<th><a href='pemesananedit.php?reservation_id=".$isi['reservation_id']."'>Edit</a> || <a href='transaksi_insert.php?reservation_id=".$isi['reservation_id']."&reservation_date=".$isi['reservation_date']."&reservation_member_id=".$isi['reservation_member_id']."'>Proses Transaksi</a></th>";
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
