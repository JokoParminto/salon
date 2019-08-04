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
    <?php
      if (!empty($_SESSION['pesan'])) {
        echo "<div class='alert success'>
              <span class='closebtn'>&times;</span>";
        echo $_SESSION['pesan'];
        echo "</div>";
      }
      unset($_SESSION['pesan']);
    ?>
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box" style="margin-top:10%;">
              <h4 class="title-a">Silahkan Pesan layanan</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="basic-form" style="margin-left:5%;">
          <form action="pesan/pemesanan_action.php" method="post">
            <div class="form-group">
              <label for="">Pilih Layanan :</label> </br>
            </div>
            <?php
            $query="select * from service ";
            $data = mysqli_query($db, $query);
            while ($isi = mysqli_fetch_assoc($data)) { 
            ?>
            <div class="form-group">
              <?php echo "<input type='checkbox' name='layanan[]' value='".$isi['service_id']."'> ".$isi['service_name']."<br>";?>
            <!-- <input type="checkbox" name="vehicle1" value="Bike"> I have a bike<br> -->
            </div>
            <?php }
            $db->close();
            ?>
            <div class="form-group">
              <label for="">Tanggal Pemesanan</label>
              <input type="date" class="form-control"  id="tanggal"  name="tanggal" >
            </div>
            <div class="form-group">
              <label for="">Jam Pemesanan</label> : 
              <input type="number" min="0" max="16" name= "jam" placeholder="16" id="jam">:
              <input type="number" min="0" max="59" name= "menit" placeholder="00" id="menit">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>         
          </form>
        </div>
      </div>
  </div>

<?php
	include("footer.php");
?>