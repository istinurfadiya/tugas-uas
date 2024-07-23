<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
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
        .btn-primary, .btn-secondary {
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
        <h2>Data Anggota</h2>
        <a href="tambah_data.php" class="btn btn-primary mb-3">Tambah Anggota Baru</a>
        <a href="../index1.php" class="btn btn-secondary mb-3">Kembali</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat Anggota</th>
                    <th>Telepon Anggota</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT * FROM anggota";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kodeanggota"]. "</td>";
                        echo "<td>" . $row["namaanggota"]. "</td>";
                        echo "<td>" . $row["jeniskelamin"]. "</td>";
                        echo "<td>" . $row["alamatanggota"]. "</td>";
                        echo "<td>" . $row["tlpanggota"]. "</td>";
                        echo "<td>" . $row["tempatlahir"]. "</td>";
                        echo "<td>" . $row["tgllahir"]. "</td>";
                        echo "<td>
                                <a href='edit_data.php?kodeanggota=".$row["kodeanggota"]."' class='btn btn-warning btn-sm'>Edit</a> 
                                <a href='hapus_data.php?kodeanggota=".$row["kodeanggota"]."' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data anggota.</td></tr>";
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
