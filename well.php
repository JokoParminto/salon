<?php
	include("connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kanzai Salon</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body> 
  <div class="click-closed"></div> 
  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Kanzai<span class="color-b">Salon</span></a>
      <!-- <a class="nav-link" href="#">login</a> -->
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#"">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->
          <li class="nav-item" style="margin-left: 32%;">
            <a class="nav-link" href="admin/index-login.php"><button type="button" style="background-color:#2ec96a;" class="btn btn-default">Login</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
  <!--/ footer Star /-->
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
              <!-- <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a> -->
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
              <!-- <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a> -->
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
              <!-- <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a> -->
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
              	<?php echo "<img src='admin/images/".$isi["service_photo"]."'  alt='' class='img-a img-fluid' style='width:100%;height:100%'/>"; ?>
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
      <!-- <div id="property-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/background.png" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">Perawatan
                      <br />Wajah</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Price | $ 12.000</span>
                  </div>
                  <a href="#" class="link-a">Click here to view
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
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/background.png" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">Potong
                      <br /> Rambut</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Price | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Durasi</h4>
                      <span>40 Menit
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/background.png" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">Bleaching
                      <br /> Rambut</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Price | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
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
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/background.png" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">Menicure
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Price | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
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
      </div> -->
    </div>
  </section>
  <div style="text-align:center; margin-top: 10px;">
    <a class="nav-link" href="admin/index-login.php"><button type="button" style="background-color:#2ec96a;" class="btn btn-default">Booking Now</button></a>
  </div>
  <!--/ Services /-->

<!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">KanzaiSalon</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Salon yang terletak di jl.Paris KM 25 ini sudah mempunyai nama yang terenal dikalangan masyarakat di Bantul Selatan karena 
                pelayanannya yang memuaskan. Tidak percaya? Silahkan mencoba.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> salonkanzai@gmail.com </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +6287812266756</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Footer End /-->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  