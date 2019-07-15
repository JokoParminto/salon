<?php
	include('../admin/login.php'); // Include Login Script
	if ((isset($_SESSION['username']) != '')) 
	{
		header('Location: ../admin/home.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="../admin/assets/core/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../admin/assets/core/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../admin/assets/core/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/core/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../admin/assets/core/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../admin/assets/core/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../admin/assets/core/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../admin/assets/core/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../admin/assets/core/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../admin/assets/core/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../admin/assets/core/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../admin/assets/core/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/assets/core/favicons/favicon-16x16.png">
    <link rel="manifest" href="../admin/assets/core/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../admin/assets/core/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Salon Kanzai</title>
    <!-- Bootstrap Core CSS -->
    <link href="../admin/assets/core/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../admin/assets/core/css/helper.css" rel="stylesheet">
    <link href="../admin/assets/core/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
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
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card" style= "background-color: #FF1493;">
                            <div class="login-form" style= "background-color: #FFB6C1;">
                                <h4>Register</h4>
                                <form action="register_action.php" method="post">
                                  <div class="form-group">
                                      <label>Nama</label>
                                      <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Masukkan nama" required="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Alamat</label>
                                      <textarea class="form-control" name="member_address" class="form-control" cols="30" rows="10" id="member_address"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="member_birthdate" id="member_birthdate">
                                  </div>
                                  <div class="form-group">
                                      <label>Nomor Telepon</label>
                                      <input type="number" class="form-control" id="member_phone" name="member_phone" placeholder="Masukkan Nomor telepon" required="">
                                  </div>
                                  <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required="">
                                  </div>
                                  <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                                  </div>
                              
                                  <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style= "background-color: #C71585;">Submit</button>
                                  <a href="../admin/index-login.php" style="color:white;">Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="../admin/assets/core/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/assets/core/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../admin/assets/core/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../admin/assets/core/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="../admin/assets/core/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../admin/assets/core/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/assets/core/js/scripts.js"></script>

</body>

</html>