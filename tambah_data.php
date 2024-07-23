<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeanggota = $_POST['kodeanggota'];
    $namaanggota = $_POST['namaanggota'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamatanggota = $_POST['alamatanggota'];
    $tlpanggota = $_POST['tlpanggota'];
    $tempatlahir = $_POST['tempatlahir'];
    $tgllahir = $_POST['tgllahir'];

    $sql = "INSERT INTO anggota (kodeanggota, namaanggota, jeniskelamin, alamatanggota, tlpanggota, tempatlahir, tgllahir) VALUES ('$kodeanggota', '$namaanggota', '$jeniskelamin', '$alamatanggota', '$tlpanggota', '$tempatlahir', '$tgllahir')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success!</strong> DATA BERHASIL DI TAMBAHKAN.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error!</strong> " . $sql . "<br>" . $koneksi->error . "
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-group label {
            font-weight: 600;
            color: #495057;
        }
        .form-control {
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            padding: 0.75rem 1.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Tambah Anggota</h2>
            <a href="form_anggota.php" class="btn btn-primary mb-3">KEMBALI</a>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="kodeanggota">Kode Anggota:</label>
                    <input type="text" class="form-control" id="kodeanggota" name="kodeanggota" required>
                </div>
                <div class="form-group">
                    <label for="namaanggota">Nama Anggota:</label>
                    <input type="text" class="form-control" id="namaanggota" name="namaanggota" required>
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jeniskelamin" name="jeniskelamin" required>
                        <option value="" disabled selected>Select Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamatanggota">Alamat Anggota:</label>
                    <input type="text" class="form-control" id="alamatanggota" name="alamatanggota" required>
                </div>
                <div class="form-group">
                    <label for="tlpanggota">Telepon Anggota:</label>
                    <input type="text" class="form-control" id="tlpanggota" name="tlpanggota" required>
                </div>
                <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir:</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required>
                </div>
                <div class="form-group">
                    <label for="tgllahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tgllahir" name="tgllahir" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
