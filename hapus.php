<?php
include '../koneksi.php';

if (isset($_GET['kodebuku'])) {
    $kodebuku = $_GET['kodebuku'];

    // Prepare SQL DELETE statement
    $sql = "DELETE FROM buku WHERE kodebuku = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $kodebuku);

    if ($stmt->execute()) {
        header('Location: data_buku.php'); // Redirect to the main page or a confirmation page
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "Kode Buku tidak ditemukan.";
}

$koneksi->close();
?>
