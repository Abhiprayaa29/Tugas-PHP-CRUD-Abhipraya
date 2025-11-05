<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa WHERE id = ?";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    mysqli_stmt_bind_param($stmt, "i", $id);

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