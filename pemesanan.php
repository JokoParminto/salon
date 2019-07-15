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
</style>
  <!--/ Gambar Slide/-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/blank-slide.png)">
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
                      <span class="color-b">Price Off </span> Perawatan Wajah</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/blank-slide.png)">
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
                      <span class="color-b">Free </span> Manicure</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/blank-slide.png)">
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
                      <span class="color-b">Price Off </span> Cuci dan blow</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
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
          <form action="layanan_action.php" method="post"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Pilih Layanan :</label> </br>
            <input type="checkbox" name="vehicle1" value="Bike"> I have a bike<br>
            </div>
            <div class="form-group">
              <label for="">Harga</label>
              <input type="time" class="form-control" name="service_price" placeholder="Harga" id="service_price">
            </div>
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea name="service_desc" class="form-control" id="service_desc" ></textarea>
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

<?php
	include("footer.php");
?>