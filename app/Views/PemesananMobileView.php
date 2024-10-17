<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>

    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('view/assets/css/style.css') ?>">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Pelanggan</h1>

        <!-- Tombol Tambah Pelanggan -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
            data-target="#modalTambahPelanggan">Tambah Pelanggan</button>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID Pemesanan</th>
                    <th>ID MOBIL</th>
                    <th>ID CUSTOMER</th>
                    <th>ID SOPIR</th>
                    <th>TANGGAL MULAI</th>
                    <th>TANGGAL SELESAI</th>
                    <th>TOTAL HARGA</th>
                    <th>STATUS PEMESANAN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemesananmobil as $p): ?>
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
                            class="btn btn-info btn-sm">Edit</a>
                        <a href="<?= base_url('pemesanan-mobil/hapus/'.$p['id_pemesanan']) ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus Pemesanan Mobil ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                            <label for="nama">id_pemesanan</label>
                            <input type="text" class="form-control" name="id_pemesanan" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">id_mobil</label>
                            <input type="text" class="form-control" name="id_mobil" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">id_customer</label>
                            <input type="text" class="form-control" name="id_customer" required>
                        </div>
                        <div class="form-group">
                            <label for="username">id_sopir</label>
                            <input type="text" class="form-control" name="id_sopir" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">tanggal_mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="">tanggal_selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" required>
                        </div>
                        <div class="form-group">
                            <label for="total_harga">total_harga</label>
                            <input type="text" class="form-control" name="total_harga" required>
                        </div>
                        <div class="form-group">
                            <label for="status_pemesanan">status_pemesanan</label>
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