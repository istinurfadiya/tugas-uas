<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .alert {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2>Edit Kategori</h2>

            <?php
            include '../koneksi.php';

            if (isset($_GET['kodekategori'])) {
                $kodekategori = $_GET['kodekategori'];

                // Fetch existing data
                $sql = "SELECT * FROM kategori WHERE kodekategori='$kodekategori'";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo '<div class="alert alert-danger" role="alert">Data tidak ditemukan.</div>';
                    exit;
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $kodekategori = $_POST['kodekategori'];
                $namakategori = $_POST['namakategori'];

                // Sanitize input
                $kodekategori = $koneksi->real_escape_string($kodekategori);
                $namakategori = $koneksi->real_escape_string($namakategori);

                $sql = "UPDATE kategori SET namakategori='$namakategori' WHERE kodekategori='$kodekategori'";

                if ($koneksi->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Kategori berhasil diperbarui!</div>';
                    header("refresh:2;url=data_kategori.php"); // Redirect after 2 seconds
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . $koneksi->error . '</div>';
                }

                $koneksi->close();
            }
            ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="kodekategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodekategori" name="kodekategori" value="<?php echo htmlspecialchars($row['kodekategori']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="namakategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namakategori" name="namakategori" value="<?php echo htmlspecialchars($row['namakategori']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                <a href="data_kategori.php" class="btn btn-secondary btn-block mt-2">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
