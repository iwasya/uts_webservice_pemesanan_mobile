<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for styling -->
    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #343a40;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Pemesanan Mobil</h1>

        <form action="<?= base_url('pemesanan-mobil/update') ?>" method="post">
            <input type="hidden" name="id_pemesanan" value="<?= esc($pemesananmobil1['id_pemesanan']) ?>">

            <div class="form-group">
                <label for="id_mobil">ID Mobil</label>
                <input type="text" class="form-control" name="id_mobil" value="<?= esc($pemesananmobil1['id_mobil']) ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="id_customer">ID Customer</label>
                <input type="text" class="form-control" name="id_customer"
                    value="<?= esc($pemesananmobil1['id_customer']) ?>" required>
            </div>

            <div class="form-group">
                <label for="no_hp">ID Sopir</label>
                <input type="text" class="form-control" name="id_sopir" value="<?= esc($pemesananmobil1['id_sopir']) ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggal_mulai"
                    value="<?= esc($pemesananmobil1['tanggal_mulai']) ?>" required>
            </div>

            <div class="form-group">
                <label for="text">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggal_selesai"
                    value="<?= esc($pemesananmobil1['tanggal_selesai']) ?>" required>
            </div>

            <div class="form-group">
                <label for="text">Total Harga</label>
                <input type="text" class="form-control" name="total_harga"
                    value="<?= esc($pemesananmobil1['total_harga']) ?>" required>
            </div>

            <div class="form-group">
                <label for="text">Status</label>
                <input type="text" class="form-control" name="status_pemesanan"
                    value="<?= esc($pemesananmobil1['status_pemesanan']) ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('pemesanan-mobil') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>