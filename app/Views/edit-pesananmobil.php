<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Pemesanan Mobil</h1>

        <form action="<?= base_url('pemesanan-mobil/update') ?>" method="post">
            <input type="hidden" name="id_pemesanan" value="<?= esc($pemesananmobil1['id_pemesanan']) ?>">

            <div class="form-group">
                <label for="nama">id mobil</label>
                <input type="text" class="form-control" name="nama" value="<?= esc($pemesananmobil1['id_mobil']) ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="alamat">id customer</label>
                <input type="text" class="form-control" name="alamat"
                    value="<?= esc($pemesananmobil1['id_customer']) ?>" required>
            </div>

            <div class="form-group">
                <label for="no_hp">id sopir </label>
                <input type="text" class="form-control" name="no_hp" value="<?= esc($pemesananmobil1['id_sopir']) ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="username">tanggal mulai</label>
                <input type="text" class="form-control" name="username"
                    value="<?= esc($pemesananmobil1['tanggal_mulai']) ?>" required>
            </div>

            <div class="form-group">
                <label for="text">tanggal selesai</label>
                <input type="text" class="form-control" name="tanggal_selesai"
                    value="<?= esc($pemesananmobil1['tanggal_selesai']) ?>" required>
            </div>
            <div class="form-group">
                <label for="text">total harga</label>
                <input type="text" class="form-control" name="total_harga"
                    value="<?= esc($pemesananmobil1['total_harga']) ?>" required>
            </div>
            <div class="form-group">
                <label for="text">Status</label>
                <input type="text" class="form-control" name="status_pemesanan"
                    value="<?= esc($pemesananmobil1['status_pemesanan']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('pemesanan-mobil') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>