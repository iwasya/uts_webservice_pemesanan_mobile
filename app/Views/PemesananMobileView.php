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
        <h1 class="text-center mb-4">Daftar Pemesanan Mobil</h1>

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
                    <?php foreach ($pemesananmobil1 as $p): ?>
                    <tr>
                        <td><?= esc($p['id_pemesanan']) ?></td>
                        <td><?= esc($p['id_mobil']) ?></td>
                        <td><?= esc($p['id_customer']) ?></td>
                        <td><?= esc($p['id_sopir']) ?></td>
                        <td><?= esc($p['tanggal_mulai']) ?></td>
                        <td><?= esc($p['tanggal_selesai']) ?></td>
                        <td><?= esc($p['total_harga']) ?></td>
                        <td><?= esc($p['status_pemesanan']) ?></td>

                        <!-- Kolom Aksi -->
                        <td>
                            <a href="<?= base_url('pemesanan-mobil/edit/'.$p['id_pemesanan']) ?>"
                                class="btn btn-info btn-sm">
                                Edit
                            </a>
                            <a href="<?= base_url('pemesanan-mobil/hapus/'.$p['id_pemesanan']) ?>"
                                class="btn btn-danger btn-sm"
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
                    <form action="<?= base_url('pemesanan-mobil/tambah') ?>" method="post">
                        <div class="form-group">
                            <label for="id_pemesanan">ID Pemesanan</label>
                            <input type="text" class="form-control" name="id_pemesanan" required>
                        </div>
                        <div class="form-group">
                            <label for="id_mobil">ID Mobil</label>
                            <input type="text" class="form-control" name="id_mobil" required>
                        </div>
                        <div class="form-group">
                            <label for="id_customer">ID Customer</label>
                            <input type="text" class="form-control" name="id_customer" required>
                        </div>
                        <div class="form-group">
                            <label for="id_sopir">ID Sopir</label>
                            <input type="text" class="form-control" name="id_sopir" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" required>
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="text" class="form-control" name="total_harga" required>
                        </div>
                        <div class="form-group">
                            <label for="status_pemesanan">Status Pemesanan</label>
                            <input type="text" class="form-control" name="status_pemesanan" required>
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