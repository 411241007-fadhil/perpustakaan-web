<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "INSERT INTO buku
    (judul, penulis, penerbit, tahun_terbit, stok)
    VALUES
    ('$judul','$penulis','$penerbit','$tahun','$stok')");

    echo "<script>
            alert('Data berhasil ditambahkan');
            window.location='index.php';
          </script>";
}
?>

<div class="card">
    <div class="card-header">
        <h3>Tambah Buku</h3>
    </div>

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <button class="btn btn-primary" name="simpan">
                Simpan
            </button>

            <a href="index.php" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

<?php
include "../../includes/footer.php";
?>