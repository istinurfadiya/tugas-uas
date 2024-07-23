<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];

    $sql = "SELECT * FROM mastertransaksi WHERE kodetransaksi = ?";
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("s", $kodetransaksi);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            $message = "<div class='alert alert-warning'>Transaksi tidak ditemukan.</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='alert alert-danger'>Error preparing statement: " . $koneksi->error . "</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodetransaksi = $_POST['kodetransaksi'];
    $tgltransaksi = $_POST['tgltransaksi'];
    $kodeanggota = $_POST['kodeanggota'];

    $sql = "UPDATE mastertransaksi SET tgltransaksi = ?, kodeanggota = ? WHERE kodetransaksi = ?";
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("sss", $tgltransaksi, $kodeanggota, $kodetransaksi);

        if ($stmt->execute()) {
            $message = "<div class='alert alert-success'>Data berhasil diupdate</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='alert alert-danger'>Error preparing statement: " . $koneksi->error . "</div>";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 2rem;
        }
        .form-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: #343a40;
        }
        .form-group label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #495057;
        }
        .form-group input {
            font-size: 0.875rem;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }
        .form-group input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn-primary {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Update Transaksi</h2>
            <?php if (isset($message)) echo $message; ?>
            <?php if (isset($row)): ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="kodetransaksi" value="<?php echo htmlspecialchars($row['kodetransaksi']); ?>">
                    <div class="form-group">
                        <label for="tgltransaksi">Tanggal Transaksi</label>
                        <input type="date" id="tgltransaksi" name="tgltransaksi" class="form-control" value="<?php echo htmlspecialchars($row['tgltransaksi']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kodeanggota">Kode Anggota</label>
                        <input type="text" id="kodeanggota" name="kodeanggota" class="form-control" value="<?php echo htmlspecialchars($row['kodeanggota']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            <?php else: ?>
                <div class="alert alert-warning">Data transaksi tidak ditemukan. Silakan kembali ke <a href="index1.php">halaman utama</a>.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
