<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 1200px;
            width: 100%;
        }
        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #343a40;
            text-align: center;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
            font-size: 16px;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-primary {
            margin-bottom: 20px;
        }
        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }
        .btn-warning, .btn-danger {
            margin: 0 5px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h2 {
                font-size: 24px;
            }
            .btn-sm {
                padding: 5px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Penulis</h2>
        <a href="form_tambah.php" class="btn btn-primary">Tambah Penulis</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Penulis</th>
                    <th>Nama Penulis</th>
                    <th>Alamat Penulis</th>
                    <th>Telp. Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT * FROM penulis";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['kodepenulisan'] . "</td>";
                        echo "<td>" . $row['namapenulis'] . "</td>";
                        echo "<td>" . $row['alamatpenulis'] . "</td>";
                        echo "<td>" . $row['telppenulis'] . "</td>";
                        echo "<td>
                                <a href='form_edit.php?kodepenulisan=" . $row['kodepenulisan'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='proses_hapus.php?kodepenulisan=" . $row['kodepenulisan'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data penulis.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
