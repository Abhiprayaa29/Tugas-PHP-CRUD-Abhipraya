<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];


    $sql = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    mysqli_stmt_bind_param($stmt, "iss", $nim, $nama, $jenis_kelamin);

    $result = mysqli_stmt_execute($stmt);


    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
 
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);

} else {
    header("Location: ../index.php");
    exit();
}
?>