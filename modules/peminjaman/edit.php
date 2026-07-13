<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM peminjaman WHERE id_pinjam='$id'");
$row = mysqli_fetch_assoc($data);

$buku = mysqli_query($conn,"SELECT * FROM buku ORDER BY judul ASC");
$peminjam = mysqli_query($conn,"SELECT * FROM peminjam ORDER BY nama ASC");

if(isset($_POST['update'])){

    $id_buku = $_POST['id_buku'];
    $id_peminjam = $_POST['id_peminjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    mysqli_query($conn,"UPDATE peminjaman SET

        id_buku='$id_buku',
        id_peminjam='$id_peminjam',
        tanggal_pinjam='$tanggal_pinjam',
        tanggal_kembali='$tanggal_kembali',
        status='$status'

        WHERE id_pinjam='$id'
    ");

    echo "<script>
        alert('Data peminjaman berhasil diperbarui');
        window.location='index.php';
    </script>";
}
?>

<div class="card shadow">

    <div class="card-header bg-warning">
        <h3>Edit Peminjaman</h3>
    </div>

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">

                <label>Buku</label>

                <select name="id_buku" class="form-select" required="required">

                    <?php while($b=mysqli_fetch_assoc($buku)){ ?>

                    <option
                        value="<?= $b['id_buku']; ?>"
                        <?= ($b['id_buku']==$row['id_buku']) ? 'selected' : ''; ?>>

                        <?= $b['judul']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label>Peminjam</label>

                <select name="id_peminjam" class="form-select" required="required">

                    <?php while($p=mysqli_fetch_assoc($peminjam)){ ?>

                    <option
                        value="<?= $p['id_peminjam']; ?>"
                        <?= ($p['id_peminjam']==$row['id_peminjam']) ? 'selected' : ''; ?>>

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
                    value="<?= $row['tanggal_pinjam']; ?>"
                    required="required">

            </div>

            <div class="mb-3">

                <label>Tanggal Kembali</label>

                <input
                    type="date"
                    name="tanggal_kembali"
                    class="form-control"
                    value="<?= $row['tanggal_kembali']; ?>"
                    required="required">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-select">

                    <option value="Dipinjam" <?= ($row['status']=="Dipinjam") ? 'selected' : ''; ?>>

                        Dipinjam

                    </option>

                    <option
                        value="Dikembalikan"
                        <?= ($row['status']=="Dikembalikan") ? 'selected' : ''; ?>>

                        Dikembalikan

                    </option>

                </select>

            </div>

            <button type="submit" name="update" class="btn btn-warning">

                Update

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