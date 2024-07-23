<?php
include '../koneksi.php';

if (isset($_GET['kodebuku'])) {
    $kodebuku = $_GET['kodebuku'];
    
    // Fetch existing data
    $sql = "SELECT * FROM buku WHERE kodebuku = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $kodebuku);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "Kode Buku tidak ada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $judulbuku = $_POST['judulbuku'];
    $isbn = $_POST['isbn'];
    $kodepenulis = $_POST['kodepenulis'];
    $kodepenerbit = $_POST['kodepenerbit'];
    $kodekategori = $_POST['kodekategori'];
    $tglterbit = $_POST['tglterbit'];
    $jmlhhalaman = $_POST['jmlhhalaman'];
    
    // Update data
    $sql = "UPDATE buku SET judulbuku=?, isbn=?, kodepenulis=?, kodepenerbit=?, kodekategori=?, tglterbit=?, jmlhhalaman=? WHERE kodebuku=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssss", $judulbuku, $isbn, $kodepenulis, $kodepenerbit, $kodekategori, $tglterbit, $jmlhhalaman, $kodebuku);
    
    if ($stmt->execute()) {
        header('Location: data_buku.php'); // Redirect to the main page or a confirmation page
        exit;
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 1rem;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <h2>Edit Buku</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="judulbuku">Judul Buku</label>
                    <input type="text" id="judulbuku" name="judulbuku" class="form-control" value="<?php echo htmlspecialchars($row['judulbuku']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" name="isbn" class="form-control" value="<?php echo htmlspecialchars($row['isbn']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="kodepenulis">Kode Penulis</label>
                    <input type="text" id="kodepenulis" name="kodepenulis" class="form-control" value="<?php echo htmlspecialchars($row['kodepenulis']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="kodepenerbit">Kode Penerbit</label>
                    <input type="text" id="kodepenerbit" name="kodepenerbit" class="form-control" value="<?php echo htmlspecialchars($row['kodepenerbit']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="kodekategori">Kode Kategori</label>
                    <input type="text" id="kodekategori" name="kodekategori" class="form-control" value="<?php echo htmlspecialchars($row['kodekategori']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="tglterbit">Tanggal Terbit</label>
                    <input type="date" id="tglterbit" name="tglterbit" class="form-control" value="<?php echo htmlspecialchars($row['tglterbit']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="jmlhhalaman">Jumlah Halaman</label>
                    <input type="number" id="jmlhhalaman" name="jmlhhalaman" class="form-control" value="<?php echo htmlspecialchars($row['jmlhhalaman']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="data_buku.php" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
