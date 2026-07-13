<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"UPDATE buku SET

        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun_terbit='$tahun',
        stok='$stok'

        WHERE id_buku='$id'
    ");

    echo "<script>
            alert('Data berhasil diperbarui');
            window.location='index.php';
          </script>";
}
?>

<div class="card">

    <div class="card-header">
        <h3>Edit Buku</h3>
    </div>

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">
                <label>Judul Buku</label>
                <input
                    type="text"
                    class="form-control"
                    name="judul"
                    value="<?= $row['judul']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input
                    type="text"
                    class="form-control"
                    name="penulis"
                    value="<?= $row['penulis']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input
                    type="text"
                    class="form-control"
                    name="penerbit"
                    value="<?= $row['penerbit']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input
                    type="number"
                    class="form-control"
                    name="tahun"
                    value="<?= $row['tahun_terbit']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input
                    type="number"
                    class="form-control"
                    name="stok"
                    value="<?= $row['stok']; ?>"
                    required>
            </div>

            <button class="btn btn-success" name="update">
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