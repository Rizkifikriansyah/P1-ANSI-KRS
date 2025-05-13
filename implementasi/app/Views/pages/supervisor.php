<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Supervisor</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px;
        }
        .form-section {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        h2, h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mb-5">Tambah Akun Mahasiswa / Dosen</h2>

        <!-- Form Mahasiswa -->
        <div class="form-section">
            <h3>Tambah Mahasiswa</h3>
            <form action="/supervisor/tambah_mahasiswa" method="post">
                <div class="mb-3">
                    <label for="username_mahasiswa" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username_mahasiswa" id="username_mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="password_mahasiswa" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password_mahasiswa" id="password_mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="nama_mahasiswa" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="nim_mahasiswa" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim_mahasiswa" id="nim_mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="prodi_mahasiswa" class="form-label">Program Studi</label>
                    <input type="text" class="form-control" name="prodi_mahasiswa" id="prodi_mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="angkatan_mahasiswa" class="form-label">Angkatan</label>
                    <input type="number" class="form-control" name="angkatan_mahasiswa" id="angkatan_mahasiswa" required>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
            </form>
        </div>

        <!-- Form Dosen -->
        <div class="form-section">
            <h3>Tambah Dosen</h3>
            <form action="/supervisor/tambah_dosen" method="post">
                <div class="mb-3">
                    <label for="username_dosen" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username_dosen" id="username_dosen" required>
                </div>

                <div class="mb-3">
                    <label for="password_dosen" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password_dosen" id="password_dosen" required>
                </div>

                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" required>
                </div>

                <div class="mb-3">
                    <label for="nip_dosen" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip_dosen" id="nip_dosen" required>
                </div>

                <div class="mb-3">
                    <label for="jurusan_dosen" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="jurusan_dosen" id="jurusan_dosen" required>
                </div>

                <button type="submit" class="btn btn-success">Tambah Dosen</button>
            </form>
        </div>
    </div>

</body>
</html>
