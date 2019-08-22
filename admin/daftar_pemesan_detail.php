<?php
	include("header-admin.php");
	$today = date('Y-m-d');
	$transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : '';
	$query="
      SELECT
      transaction.*,
      member.*
    FROM transaction 
    JOIN member ON member.member_id = transaction.transaction_member_id
		WHERE transaction.transaction_id = ".$transaction_id."";
	$detail_transaction= mysqli_query($db, $query);
	$isi=mysqli_fetch_assoc($detail_transaction);
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
    <!-- Start Page Content -->
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body" id="cetak">
				<h4 class="card-title">Data pemesanan</h4>
					<div class="col-md-12 col-xs-12"  id="master">
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Nama Member</b></label>
							<label class="col-lg-8 col-xs-12 control-label namamember"><?= $isi['member_name']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Tanggal Pemesanan</b></label>
							<label class="col-lg-8 col-xs-12 control-label tglpesan"><?= $isi['transaction_date']?></label>
						</div>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Status Pemesanan</b></label>
							<label class="col-lg-8 col-xs-12 control-label status"><?= $isi['transaction_status']?></label>
						</div>
					</div>
					<div class="card-body" id="detail">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
                    <th>Layanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status Pemesanan</th>
										<th>Harga</th>
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
                      echo "<th>" . $isiResepDetail["transaction_date"].  "</th>";
                      echo "<th>" . $isiResepDetail["transaction_status"].  "</th>";
                      echo "<th>" ."Rp"." ".$isiResepDetail["service_price"].  "</th>";
											echo "</tr>";
										}
										$tot="
											SELECT SUM(service.service_price) as total
											FROM transaction 
											JOIN transaction_detail ON transaction_detail.transaction_detail_transaction_id = transaction.transaction_id
											JOIN service ON service.service_id = transaction_detail.transaction_detail_service_id
											WHERE transaction.transaction_id = '$transaction_id'";
										$tot_price= mysqli_query($db, $tot);
										$data=mysqli_fetch_assoc($tot_price);
										echo "<tr>";
										echo "<th colspan='4' style='text-align:center;font-weight: bold;'>Total</th>";
										echo "<th>" ."Rp"." ".$data["total"].  "</th>";
										echo "</tr>";
										echo "</table>";
									$db->close();
								?>
								</tbody>
							</table>
						</div>
					</div>
					<button type="submit" class="btn btn-default" style="background-color:#245a07;" onclick="window.history.back();">Kembali</button>
          <!-- <button type="submit" class="btn btn-default" style="background-color:#1d3886;" onclick="printData();">Cetak</button> -->
				</div>
			</div>
		</div>
	</div>
    <!-- End PAge Content -->
</div>
</div>
<!-- End Page wrapper  -->
</div>
</body>
<script>
function printData()
{
   var divToPrint=document.getElementById("cetak");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
<!-- End Wrapper -->
</html>