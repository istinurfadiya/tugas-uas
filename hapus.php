<?php
include '../koneksi.php';

if (isset($_GET['kodekategori'])) {
    $kodekategori = $_GET['kodekategori'];

    // Sanitize input
    $kodekategori = $koneksi->real_escape_string($kodekategori);

    // Query to delete the record
    $sql = "DELETE FROM kategori WHERE kodekategori='$kodekategori'";

    if ($koneksi->query($sql) === TRUE) {
        // Redirect to the main page with a success message
        header("Location: data_kategori.php?message=success");
    } else {
        // Redirect to the main page with an error message
        header("Location: data_kategori.php?message=error");
    }

    $koneksi->close();
} else {
    // Redirect to the main page if no kodekategori is provided
    header("Location: data_kategori.php?message=invalid");
}
?>
