<?php
	include("header.php");
?>
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

  <!--/ Our Service /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-check-square-o"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Cream Bath</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              Menyediakan product yang unggul dan aman yaitu ada Loreal, Makarizo, dan Matrix.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-scissors"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Potong Rambut</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              Tidak akan mengecewakan jika potong rambut disini, karena disini karyawannya sudah profesional.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-check-square-o"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Bleaching Rambut</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              Menggunakan bahan yang aman dan tidak merusak rambut justru rambut menjadi halus.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/  Our Service /-->

  <!--/ Services /-->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Services</h2>
            </div>
            <!-- <div class="title-link">
              <a href="#">All Services
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    <div id="property-carousel" class="owl-carousel owl-theme">
        <?php
	      $query="select * from service ";
        $dataPasien = mysqli_query($db, $query);
        while ($isi = mysqli_fetch_assoc($dataPasien)) { ?>
          <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
              	<?php echo "<img src='admin/images/".$isi["service_photo"]."'  alt='' class='img-a img-fluid' />"; ?>
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                    	<?php echo "<a href='property-single.html'>".$isi["service_name"]; ?>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <?php echo "<span class='price-a'>Harga "." | "."Rp"." ".$isi["service_price"]."</span>"; ?>
                      <!-- <span class="price-a">Price | $ 12.000</span> -->
                    </div>
                    <a href="#" class="link-a">
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Durasi</h4> 
                        <span>60 Menit
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
       <?php }
       $db->close();
       ?>
    </div>
  </section>
  <!--/ Services /-->
   <div style="text-align:center; margin-top: 10px;">
    <a class="nav-link" href="pemesanan.php"><button type="button" style="background-color:#2ec96a;" class="btn btn-default">Booking Now</button></a>
  </div>
<?php
	include("footer.php");
?>
  