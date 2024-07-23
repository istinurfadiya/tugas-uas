<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku Sekolah</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <header>
        <div class="bg-success collapse" id="menuTop">
            <div class="container">
                <div class="row">
                    
                    
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-warning shadow-sm">
            <div class="container">
                <a class="navbar-brand align-items-center" style="color:#fff;">
                    <strong> Peminjaman Buku Perpustakaan</strong>
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#menuTop" aria-expanded="false">
                    
                </button>
            </div>
        </div>
    </header>

    <main role="main">
        <section class="jumbotron text-center" style="background: #fff;">
            <div class="container">
                <h3 class="">Selamat Datang </h3>
                <?php 
                    if(isset($_SESSION['username'])){
                        $username = ($_SESSION['username']) ? $_SESSION['username'] : "";
                        echo $username;
                ?>
                    <a href="../index.php" class="btn btn-danger btn-sm">Logout</a><br>
                    <div class="btn-group" style="margin-top: 15px;">                       
                    </div>
                <?php
                    }
                ?>
                <h1 class="jumbotron-heading" style="font-style: italic;">Daftar Buku </h1>
                <h1> Pilih Buku yang ingin dipinjam dari Daftar Buku Perpustakaan Sekolah</h1>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                        include 'config.php';
                        $query = mysqli_query($conn, "SELECT * FROM buku ORDER BY id ASC");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm" style="margin-bottom: 1.5rem;">
                            <img src="assets/img/uploads/<?php echo $data['gambar_buku'];?>" style="width: 300px; height: 250px; margin: 5px 8px;">
                            <div class="card-body">
                                <p class="card-text"><?php echo $data['judulbuku'];?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="proses-pinjam.php?username=<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "";?>&id_barang=<?php echo $data['id'];?>" class="btn btn-outline-info">Pinjam</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php   
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
