<?php
	include("header-admin.php");

	$transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : '';
    $query="SELECT
				transaction.*,
				member.*
			FROM transaction 
			JOIN member ON member.member_id = transaction.transaction_member_id
			WHERE transaction.transaction_id = ".$transaction_id."";
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
										<input type="hidden" class="form-control" name="transaction_id" id="transaction_id" value="<?= $isi['transaction_id'];?>">
										<div class="form-group">
											<label for="">Nama Pemesan</label>
											<input type="text" class="form-control" name="member_name" id="member_name" value="<?=$isi['member_name']?>"</readonly>
										</div>
                    <div class="form-group">
											<label for="">Tanggal Pemesanan</label>
											<input type="text" class="form-control" name="transaction_date" id="transaction_date" value="<?=$isi['transaction_date']?>"</readonly>
										</div>
										<!-- <div class="form-group">
											<label for="">Harga</label>
											  <input type="number" name="service_price" class="form-control" cols="30" rows="10" id="service_price" value="<?=$isi['service_price']?>"</readonly>
										</div>
                    <div class="form-group">
											<label for="">Tanggal Pesan</label>
											  <input type="text" name="service_price" class="form-control" cols="30" rows="10" id="reservation_date" value="<?=$isi['reservation_date']?>"</readonly>
										</div> -->
                    <div class="form-group">
											<label for="">Status Pesan</label>
											<select class="form-control" name="transaction_status" required="" id="transaction_status">
												<!-- <option value="">Pilih Status</option> -->
												<option value="confirmed" >Confirmed</option>
												<option value="ok" >Ok</option>
												<!-- <option value="close" >Close</option> -->
												<option value="cancel" >Cancel</option>
											</select>
										</div>
										<button type="submit" class="btn btn-default" style="background-color: #1d8638;">Submit</button>         
									</form>
								</div>
							</div>
						</div>
						<div class="card-body" id="detail">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Layanan</th>
											<th>Harga</th>
											<th>Tanggal Pemesanan</th>
											<th>Status Pemesanan</th>
										</tr>
									</thead>
									<tbody id="dataobat">
									<?php
										$query="
											SELECT
												transaction.*,
												transaction_detail.*,
												service.*
											FROM transaction 
											JOIN transaction_detail ON transaction_detail.transaction_detail_transaction_id = transaction.transaction_id
											JOIN service ON service.service_id = transaction_detail.transaction_detail_service_id
											WHERE transaction.transaction_id = '$transaction_id'";
										$i=1;
										// var_dump($query);exit;
										$dataResepDetail= mysqli_query($db, $query);
										while ($isiResepDetail = mysqli_fetch_assoc($dataResepDetail)) {
												echo "<tr>";
												echo "<th>" . $i++.  "</th>";
												echo "<th>" . $isiResepDetail["service_name"].  "</th>";
												echo "<th>" ."Rp"." ".$isiResepDetail["service_price"].  "</th>";
												echo "<th>" . $isiResepDetail["transaction_date"].  "</th>";
												echo "<th>" . $isiResepDetail["transaction_status"].  "</th>";
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