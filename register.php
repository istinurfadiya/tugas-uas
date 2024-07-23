<?php
include 'config.php';

if (isset($_POST['daftar'])) {
    // Mengambil data dari form
    $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $nim        = mysqli_real_escape_string($conn, $_POST['nim']);
    $prodi      = mysqli_real_escape_string($conn, $_POST['prodi']);
    $role       = mysqli_real_escape_string($conn, $_POST['role']);
    $username   = mysqli_real_escape_string($conn, $_POST['username']);
    $password   = md5(mysqli_real_escape_string($conn, $_POST['password'])); // Hash password

    // Query untuk menyimpan data ke tabel user
    $sql = "INSERT INTO user (nama, email, nim, prodi, role, username, password) VALUES ('$nama', '$email', '$nim', '$prodi', '$role', '$username', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berhasil Register');</script>";
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | Peminjaman Barang Sekolah</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="background-image: url('') !important;">
    <div class="container">
        <div class='row'>
            <div class="col-md-4"></div>
            <div class="col-md-4 form-register-container">
                <h2 class="">Registrasi Akun</h2>
                <form action="" method="post">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="nama" required>
                    
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" required>
                    
                    <label>NIM</label>
                    <input class="form-control" type="text" name="nim" required>
                    
                    <label>Program Studi</label>
                    <select class="form-control" name="prodi" required>
                        <option value="">Pilih Program Studi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                    </select>
                    
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="anggota">Anggota</option>
                    </select>
                    
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" required>
                    
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required>
                    
                    <br>
                    <input type="checkbox" name="terms" required> Saya setuju dengan <a href="#">syarat dan ketentuan</a>.
                    <button type="submit" name="daftar" class="btn btn-success" style="margin-top: 20px;">DAFTAR</button>
                    <a href="index.php" class="btn btn-danger" style="margin-top: 20px; float:right">BATAL</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
