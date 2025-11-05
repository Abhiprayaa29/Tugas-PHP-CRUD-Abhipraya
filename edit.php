<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    

    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    

    $sql = "UPDATE mahasiswa SET nim = ?, nama = ?, jenis_kelamin = ? WHERE id = ?";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    mysqli_stmt_bind_param($stmt, "sssi", $nim, $nama, $jenis_kelamin, $id);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        header('Location: ../index.php');
        exit();
    } else {
        die('Gagal menyimpan perubahan: ' . mysqli_stmt_error($stmt));
    }


} else {
    die("Akses dilarang...");
}
?>