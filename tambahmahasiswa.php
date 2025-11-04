<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tambahmahasiswa.php">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="mainbackground ms-5 pt-5 pb-5 me-5 mt-5 shadow-sm rounded-4">
        
        <h3 class="w-50 mx-auto mb-4">
            Masukan Data Mahasiswa:
        </h3>

        <form action="logic/tambah.php" method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control shadow-sm" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control shadow-sm" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Pilih Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select shadow-sm">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>
</body>
</html>