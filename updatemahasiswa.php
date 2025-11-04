<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM mahasiswa WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

$mahasiswa = mysqli_fetch_assoc($query);

if (!$mahasiswa) {
    die("Data tidak ditemukan...");
}

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .mainbackground { background-color: rgb(230, 226, 222); }
    </style>
</head>
<body>

    <header class="bg-dark py-3 shadow-sm">
        <div class="container">
            <h3 class="text-white fs-5 text-center mx-auto">Sistem Informasi Akademik Mahasiswa</h3>
        </div>
    </header>

    <div class="mainbackground ms-5 pt-5 pb-5 me-5 mt-5 shadow-sm rounded-4">
        
        <h3 class="w-50 mx-auto mb-4">
            Ubah Data Mahasiswa:
        </h3>

        <form action="logic/edit.php" method="POST" class="w-50 mx-auto">
            
            <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>" />

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control shadow-sm" id="nim" name="nim" value="<?php echo htmlspecialchars($mahasiswa['nim']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control shadow-sm" id="nama" name="nama" value="<?php echo htmlspecialchars($mahasiswa['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select shadow-sm">
                    <?php $jenis_kelamin = $mahasiswa['jenis_kelamin']; ?>
                    <option <?php echo ($jenis_kelamin == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
                    <option <?php echo ($jenis_kelamin == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                </select>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>