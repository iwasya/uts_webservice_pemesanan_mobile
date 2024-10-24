<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan Mobil</title>

    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('view/assets/css/style.css') ?>">

    <style>
    /* Custom styles */
    body {
        background-color: #f4f7f6;
    }

    h1 {
        color: #333;
        font-weight: 700;
    }

    .table {
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f3f5;
    }

    .modal-header {
        background-color: #007bff;
        color: white;
    }

    .modal-content {
        border-radius: 10px;
    }

    /* Hover effects on buttons */
    .btn-info:hover {
        background-color: #117a8b;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Header -->
        <h1 class="text-center mb-4">Daftar Pelanggan</h1>

        <!-- Tombol Tambah Pelanggan -->
        <div class="text-right mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPelanggan">
                <i class="fas fa-plus"></i> Tambah Pelanggan
            </button>
        </div>

        <!-- Tabel Data Pelanggan -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Pemesanan</th>
                        <th>ID Mobil</th>
                        <th>ID Customer</th>
                        <th>ID Sopir</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Total Harga</th>
                        <th>Status Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customer1 as $p): ?>
                    <tr>
                        <td><?= esc($p['id_customer']) ?></td>
                        <td><?= esc($p['nik_customer']) ?></td>
                        <td><?= esc($p['nama_customer']) ?></td>
                        <td><?= esc($p['jenis_kelamin']) ?></td>
                        <td><?= esc($p['pekerjaan']) ?></td>
                        <td><?= esc($p['nomor_telepon']) ?></td>
                        <td><?= esc($p['alamat']) ?></td>
                        <td><?= esc($p['email']) ?></td>

                        <!-- Kolom Aksi -->
                        <td>
                            <a href="<?= base_url('/customer/edit/'.$p['id_customer']) ?>" class="btn btn-info btn-sm">
                                Edit
                            </a>
                            <a href="<?= base_url('customer/hapus/'.$p['id_customer']) ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus Pemesanan Mobil ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Pelanggan -->
    <div class="modal fade" id="modalTambahPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah Pelanggan -->
                    <form action="<?= base_url('customer/tambah') ?>" method="post">
                        <div class="form-group">
                            <label for="id_customer">ID Customer</label>
                            <input type="text" class="form-control" name="id_customer" required>
                        </div>
                        <div class="form-group">
                            <label for="nik_customer">NIk Customer</label>
                            <input type="text" class="form-control" name="nik_customer" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_customer">Nama Customer</label>
                            <input type="text" class="form-control" name="nama_customer" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" name="nomor_telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>