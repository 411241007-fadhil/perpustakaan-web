<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM peminjam WHERE id_peminjam='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn,"UPDATE peminjam SET

        nama='$nama',
        nim='$nim',
        jurusan='$jurusan',
        no_hp='$no_hp'

        WHERE id_peminjam='$id'
    ");

    echo "<script>
    alert('Data berhasil diperbarui');
    window.location='index.php';
    </script>";

}
?>

<div class="card shadow">

    <div class="card-header bg-warning">

        <h3>Edit Peminjam</h3>

    </div>

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">

                <label>Nama</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="<?= $row['nama']; ?>"
                    required="required">

            </div>

            <div class="mb-3">

                <label>NIM</label>

                <input
                    type="text"
                    name="nim"
                    class="form-control"
                    value="<?= $row['nim']; ?>"
                    required="required">

            </div>

            <div class="mb-3">

                <label>Jurusan</label>

                <input
                    type="text"
                    name="jurusan"
                    class="form-control"
                    value="<?= $row['jurusan']; ?>"
                    required="required">

            </div>

            <div class="mb-3">

                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="<?= $row['no_hp']; ?>"
                    required="required">

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