<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodetransaksi = $_POST['kodetransaksi'];
    $tgltransaksi = $_POST['tgltransaksi'];
    $kodeanggota = $_POST['kodeanggota'];

    $sql = "INSERT INTO mastertransaksi (kodetransaksi, tgltransaksi, kodeanggota) VALUES (?, ?, ?)";

    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("sss", $kodetransaksi, $tgltransaksi, $kodeanggota);

        if ($stmt->execute()) {
            $message = "<div class='alert alert-success'>Data berhasil ditambahkan</div>";
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
    <title>Tambah Transaksi Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .form-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 450px;
            margin: 2rem auto;
        }
        .form-container h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #343a40;
        }
        .form-group label {
            font-size: 0.9rem;
            font-weight: bold;
            color: #495057;
        }
        .form-group input,
        .form-group input[type="date"] {
            font-size: 0.875rem;
            padding: 0.5rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }
        .form-group input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .alert {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="mb-4">Tambah Transaksi Baru</h2>
            <?php if (isset($message)) echo $message; ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="kodetransaksi">Kode Transaksi</label>
                    <input type="text" id="kodetransaksi" name="kodetransaksi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tgltransaksi">Tanggal Transaksi</label>
                    <input type="date" id="tgltransaksi" name="tgltransaksi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kodeanggota">Kode Anggota</label>
                    <input type="text" id="kodeanggota" name="kodeanggota" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</body>
</html>
