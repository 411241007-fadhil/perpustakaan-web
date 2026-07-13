<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

if(isset($_POST['simpan'])){

    $id_buku = $_POST['id_buku'];
    $id_peminjam = $_POST['id_peminjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    mysqli_query($conn,"INSERT INTO peminjaman
    (id_buku,id_peminjam,tanggal_pinjam,tanggal_kembali,status)
    VALUES
    ('$id_buku','$id_peminjam','$tanggal_pinjam','$tanggal_kembali','$status')");

    echo "<script>
        alert('Data peminjaman berhasil ditambahkan');
        window.location='index.php';
    </script>";
}

$buku = mysqli_query($conn,"SELECT * FROM buku ORDER BY judul ASC");
$peminjam = mysqli_query($conn,"SELECT * FROM peminjam ORDER BY nama ASC");
?>

<div class="card shadow">

    <div class="card-header bg-success text-white">
        <h3>Tambah Peminjaman</h3>
    </div>

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">
                <label>Buku</label>

                <select name="id_buku" class="form-select" required="required">

                    <option value="">-- Pilih Buku --</option>

                    <?php while($b = mysqli_fetch_assoc($buku)){ ?>

                    <option value="<?= $b['id_buku']; ?>">

                        <?= $b['judul']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label>Peminjam</label>

                <select name="id_peminjam" class="form-select" required="required">

                    <option value="">-- Pilih Peminjam --</option>

                    <?php while($p = mysqli_fetch_assoc($peminjam)){ ?>

                    <option value="<?= $p['id_peminjam']; ?>">

                        <?= $p['nama']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label>Tanggal Pinjam</label>

                <input
                    type="date"
                    name="tanggal_pinjam"
                    class="form-control"
                    required="required">

            </div>

            <div class="mb-3">

                <label>Tanggal Kembali</label>

                <input
                    type="date"
                    name="tanggal_kembali"
                    class="form-control"
                    required="required">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-select">

                    <option value="Dipinjam">Dipinjam</option>

                    <option value="Dikembalikan">Dikembalikan</option>

                </select>

            </div>

            <button type="submit" name="simpan" class="btn btn-success">

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