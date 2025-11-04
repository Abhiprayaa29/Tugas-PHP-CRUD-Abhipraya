<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .mainbackground {
            background-color: rgb(230, 226, 222);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Speda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambahmahasiswa.php">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


        <br>

        <div class="container">
            <h3 class="fs-5 text-center mt-5">Daftar Mahasiswa:</h3>
        </div>

        <div class="w-75 mx-auto mt-4 mb-3">
            <form action="index.php" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="cari_nim" placeholder="Cari Mahasiswa berdasarkan NIM..." aria-label="Search" value="<?php echo isset($_GET['cari_nim']) ? htmlspecialchars($_GET['cari_nim']) : ''; ?>">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
                <a href="index.php" class="btn btn-outline-secondary ms-2">Reset</a>
            </form>
        </div>
        <div class="w-75 mx-auto">
            <table class="table table-striped table-hover shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">NIM</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $params = [];
                    $types = "";
                    $query = "SELECT * FROM mahasiswa";

                    if (isset($_GET['cari_nim']) && !empty($_GET['cari_nim'])) {
                        $nim_dicari = "%" . $_GET['cari_nim'] . "%"; 
                        $query .= " WHERE nim LIKE ?";
                        $params[] = &$nim_dicari; 
                        $types .= "s"; 
                    }

                    $query .= " ORDER BY id DESC"; 
                    $stmt = mysqli_prepare($koneksi, $query);
                    

                    if (!empty($params)) {
                        mysqli_stmt_bind_param($stmt, $types, ...$params);
                    }
                    
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $nomor = 1; 
                    

                    if (mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th class="text-center align-middle"><?php echo $nomor++; ?></th>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($data['nim']); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($data['nama']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($data['jenis_kelamin']); ?></td>
                            <td class="text-center">
                                <a href="updatemahasiswa.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                            
                                <a href="logic/hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>

                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center fst-italic">Data tidak ditemukan.</td></tr>';
                    }
                    mysqli_stmt_close($stmt); 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>