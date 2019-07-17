<?php
	include("header-admin.php");
?>
<?php
	include("fusion.php");
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
          <h4 class="card-title">Grafik</h4>
          <!-- Nav tabs -->
          
      </div>
      <div class="">
        <ul class="nav nav-tabs tabs-vertical" role="tablist">
          <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Daftar Laporan Grafik</span></a> </li>
          <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-member'? 'active show' : '' ?>" data-toggle="tab" href="#member" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Grafik Member Perperiode</span></a> </li>
          <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-transaksi'? 'active show' : '' ?>" data-toggle="tab" href="#transaksi" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Grafik Transaksi Perperiode</span></a> </li>
        </ul>
        <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" id="list" role="tabpanel">
					<p>
          <h4 class="card-title">Grafik Member Perperiode</h4>
          <h4 class="card-title">Grafik Transaksi Perperiode</h4>
          </p>
        </div>
        <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-member' ? 'active show' : '' ?>" id="member" role="tabpanel">
            <div class="col-md-4 form-group">
              <label for="">Pilih Periode</label>
              <input type="month" class="form-control" name="tgl_daftar" placeholder="dd/mm/yyyy" id="tgl_daftar" value="<?=isset($_GET['startdate']) ? $_GET['startdate'] : ''?>">
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary" type="button" value="submit" id="reloadLaporanMember" data="data-member"/>
                  <button type="reset" class="btn btn-primary">reset</button>
              </div>
            </div class="table-responsive" >
              <?php
                $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
                $parsing = substr($startdate, 5,2);
                $strQuery = "
                   SELECT DAY(member_created_at) AS hari, COUNT(member_id) as total
                  FROM member
                  WHERE MONTH(member_created_at) = '$parsing'
                  GROUP BY member_created_at
                ";
                $result = mysqli_query($db, $strQuery);
                if ($result) {
                  $nama_bulan = '';
                  if ($parsing == '01') {
                    $nama_bulan = 'Januari'; 
                  }
                  if ($parsing == '02') {
                    $nama_bulan = 'Februari'; 
                  }
                  if ($parsing == '03') {
                    $nama_bulan = 'Maret'; 
                  }
                  if ($parsing == '04') {
                    $nama_bulan = 'April'; 
                  }
                  if ($parsing == '05') {
                    $nama_bulan = 'Mei';  
                  }
                  if ($parsing == '06') {
                    $nama_bulan = 'Juni';   
                  }
                  if ($parsing == '07') {
                    $nama_bulan = 'Juli';   
                  }
                  if ($parsing == '08') {
                    $nama_bulan = 'Agustus';   
                  }
                  if ($parsing == '09') {
                    $nama_bulan = 'September';  
                  }
                  if ($parsing == '10') {
                    $nama_bulan = 'Oktober';   
                  }
                  if ($parsing == '11') {
                    $nama_bulan = 'Nopember';   
                  }
                  if ($parsing == '12') {
                    $nama_bulan = 'desember';   
                  }
                $arrData = array(
                  "chart" => array(
                      "caption"=>"Grafik Member Perperiode",
                      "subcaption"=> "Periode Bulanan"." ".$nama_bulan,
                      "yaxismaxvalue"=> "100",
                      "decimals"=> "0",
                      "numbersuffix"=> "orang",
                      "placevaluesinside"=> "1",
                      "rotatevalues"=> "0",
                      "divlinealpha"=> "50",
                      "plotfillalpha"=> "80",
                      "drawCrossLine"=> "1",
                      "crossLineColor"=> "#00b7cc",
                      "crossLineAlpha"=> "100",
                      "theme"=> "zune"
                      )
                    );
                    $categoryArray=array();
                    $dataseries1=array();
                    while($row = mysqli_fetch_array($result)) {
                    array_push($categoryArray, array(
                      "label" => $row['hari']));
                      array_push($dataseries1, array(
                      "value" => $row['total']));
                    }
                  $arrData["categories"]=array(array("category"=>$categoryArray));
                  $arrData["dataset"] = array(array("seriesName"=> "total", "data"=>$dataseries1));
                  $jsonEncodedData = json_encode($arrData);
                  // var_dump($jsonEncodedData);exit();
                  $msChart = new FusionCharts("mscombi2d", "chart1" , "750", "400", "chart-container", "json", $jsonEncodedData);
                  $msChart->render();
                }
              ?>
              <center>
                <div id="chart-container">
                </div>
            </center>
        </div>
        <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-transaksi' ? 'active show' : '' ?>" id="transaksi" role="tabpanel">
            <div class="col-md-4 form-group">
              <label for="">Pilih Periode</label>
              <input type="month" class="form-control" name="tgl_transaksi" placeholder="dd/mm/yyyy" id="tgl_transaksi" value="<?=isset($_GET['bulan']) ? $_GET['bulan'] : ''?>">
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary" type="button" value="submit" id="reloadLaporanTransaksi" data="data-transaksi"/>
                  <button type="reset" class="btn btn-primary">reset</button>
              </div>
            </div class="table-responsive" >
              <?php
                $startdate = isset($_GET['bulan']) ? $_GET['bulan'] : '';
                $parsing = substr($startdate, 5,2);
                $strQuery = "
                  SELECT DAY(transaction_created_at) AS hari, COUNT(transaction_id) as total
                  FROM transaction
                  WHERE MONTH(transaction_created_at) = '$parsing'
                  GROUP BY transaction_created_at
                ";
                $result = mysqli_query($db, $strQuery);
                if ($result) {
                  $nama_bulan = '';
                  if ($parsing == '01') {
                    $nama_bulan = 'Januari'; 
                  }
                  if ($parsing == '02') {
                    $nama_bulan = 'Februari'; 
                  }
                  if ($parsing == '03') {
                    $nama_bulan = 'Maret'; 
                  }
                  if ($parsing == '04') {
                    $nama_bulan = 'April'; 
                  }
                  if ($parsing == '05') {
                    $nama_bulan = 'Mei';  
                  }
                  if ($parsing == '06') {
                    $nama_bulan = 'Juni';   
                  }
                  if ($parsing == '07') {
                    $nama_bulan = 'Juli';   
                  }
                  if ($parsing == '08') {
                    $nama_bulan = 'Agustus';   
                  }
                  if ($parsing == '09') {
                    $nama_bulan = 'September';  
                  }
                  if ($parsing == '10') {
                    $nama_bulan = 'Oktober';   
                  }
                  if ($parsing == '11') {
                    $nama_bulan = 'Nopember';   
                  }
                  if ($parsing == '12') {
                    $nama_bulan = 'desember';   
                  }
                $arrData = array(
                  "chart" => array(
                    "caption"=>"Grafik Transaksi Perperiode",
                    "subcaption"=> "Periode Bulanan"." ".$nama_bulan,
                    "yaxismaxvalue"=> "100",
                    "decimals"=> "0",
                    "numbersuffix"=> "orang",
                    "placevaluesinside"=> "1",
                    "rotatevalues"=> "0",
                    "divlinealpha"=> "50",
                    "plotfillalpha"=> "80",
                    "drawCrossLine"=> "1",
                    "crossLineColor"=> "#00b7cc",
                    "crossLineAlpha"=> "100",
                    "theme"=> "zune"
                    )
                  );
                    $categoryArray=array();
                    $dataseries1=array();
                    while($row = mysqli_fetch_array($result)) {
                    array_push($categoryArray, array(
                      "label" => $row['hari']));
                      array_push($dataseries1, array(
                      "value" => $row['total']));
                    }
                  $arrData["categories"]=array(array("category"=>$categoryArray));
                  $arrData["dataset"] = array(array("seriesName"=> "total", "data"=>$dataseries1));
                  $jsonEncodedData = json_encode($arrData);
                  $msChart = new FusionCharts("mscombi2d", "chart2" , "750", "400", "chart-container-new", "json", $jsonEncodedData);
                  $msChart->render();
                }
              ?>
              <center>
                <div id="chart-container-new">
                </div>
            </center>
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
<script src="chart/js/fusioncharts.js"></script>
<script src="chart/js/themes/fusioncharts.theme.fint.js"></script>
<script>
$(document).ready(function() {
	$('.table').DataTable({
		'dom': 'Bfrtip',
		'buttons': ['copy', 'csv', 'excel', 'pdf', 'print']
		});
	});
	$('#reloadLaporanMember').on('click', function(){
		console.log('a');
		window.location.href = 'chart.php?typelaporan='+$(this).attr('data')+'&startdate='+$('#tgl_daftar').val();
	});
  $('#reloadLaporanTransaksi').on('click', function(){
		console.log('a');
		window.location.href = 'chart.php?typelaporan='+$(this).attr('data')+'&bulan='+$('#tgl_transaksi').val();
	});
</script>
</html>
