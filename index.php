<?php
session_start();

include 'koneksi.php';

$tgl = date('Y-m-d');

if(isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])){
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>SI Perpustakaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="index.php" class="logo">Ruang Baca by greselia</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.php?p=beranda"><span class="fa fa-home mr-3"></span> Beranda</a>
          </li>
          <li class="active">
              <a href="index.php?p=anggota"><span class="fa fa-user mr-3"></span> Data Anggota</a>
          </li>
          <li class="active">
            <a href="index.php?p=buku"><span class="fa fa-sticky-note mr-3"></span> Data Buku</a>
          </li>
          <li class="active">
            <a href="index.php?p=transaksi"><span class="fa fa-paper-plane mr-3"></span> Data Transaksi</a>
          </li>
          <li class="active">
            <a href="pages/cetak-laporan.php"><span class="fa fa-download mr-3"></span> Laporan Transaksi</a>
          </li>
          <li class="active">
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Logout</a>
          </li><br><br>
          <li>
            <p>Copyright &copy; 2021
              by greselia</p>
          </li>
        </ul>

    	</nav>
<?php
                    $pages_dir = 'pages';
                    if(!empty($_GET['p'])){
                        $pages = scandir($pages_dir,0);
                        unset($pages[0], $pages[1]);

                        $p = $_GET['p'];
                        if(in_array($p.'.php',$pages)){
                            include($pages_dir.'/'.$p.'.php');
                        }else{
                            echo'Halaman Tidak Ditemukan';
                        }
                    }else{
                        include($pages_dir.'/beranda.php');
                    }
                ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

<?php
} else{
    echo "<script>aler('Anda Harus Login Dahulu!');</script>";
    header('location:login.php');
}
?>