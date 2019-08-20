 <?php
	include("header.php");
?>
<style>
  form-group {
  margin-bottom: 20px;
}
.form-control {
  height: 42px;
  border-radius: 0;
  box-shadow: none;
  border-color: #e7e7e7;
  font-family: 'Poppins', sans-serif;
}
.form-control:hover {
  box-shadow: none;
  border-color: #e7e7e7;
}
.form-control.active,
.form-control:focus {
  box-shadow: none;
  border-color: #878787;
}
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
  var close = document.getElementsByClassName("closebtn");
  var i; 
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }
</script>
  <!--/ Gambar Slide/-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/coloring.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Kanzai Salon
                      </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">Price Off </span>Coloring</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">price | Rp. 275.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/potong.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Kanzai Salon
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">Price Off </span> Potong Rambut</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">price | Rp. 20.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/Rambut.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Kanzai Salon
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">Promo </span> Creambath Loreal</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">price | Rp. 60.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Gambar Slide /-->

  <div class="container">
    <div class="tab-pane p-20" id="daftar" role="tabpanel" style="padding-top:12%;">
      <div class="form-group">
        <h3>Riwayat Pemesanan<h3>
      </div>
      <div class="table-responsive m-t-40">
        <table id="datatable-pasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Layanan</th>
              <th>Harga</th>
              <th>Tanggal Pemesanan</th>
              <th>Status Pemesanan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $id_member = $_SESSION['user_id'];
              $query="SELECT
                  transaction.*,
                  transaction_detail.*,
                  service.*
                FROM transaction 
                JOIN transaction_detail ON transaction_detail.transaction_detail_transaction_id = transaction.transaction_id
                JOIN service ON service.service_id = transaction_detail.transaction_detail_service_id
                WHERE transaction.transaction_member_id = '$id_member'
              ";
              $dataPasien= mysqli_query($db, $query);
              while ($isi = mysqli_fetch_assoc($dataPasien)) {
                  echo "<tr>";
                  echo "<th>" . $isi["service_name"].  "</th>";
                  echo "<th>" ."Rp"." ".$isi["service_price"].  "</th>";
                  echo "<th>" . $isi["transaction_date"].  "</th>";
                  echo "<th>" . $isi["transaction_status"].  "</th>";
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

<?php
	include("footer.php");
?>