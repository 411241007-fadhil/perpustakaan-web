<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn,"INSERT INTO peminjam
    (nama,nim,jurusan,no_hp)
    VALUES
    ('$nama','$nim','$jurusan','$no_hp')");

    echo "<script>
    alert('Data peminjam berhasil ditambahkan');
    window.location='index.php';
    </script>";

}
?>

<div class="card shadow">

    <div class="card-header bg-success text-white">

        <h3>Tambah Peminjam</h3>

    </div>

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">

                <label>Nama</label>

                <input type="text" name="nama" class="form-control" required="required">

            </div>

            <div class="mb-3">

                <label>NIM</label>

                <input type="text" name="nim" class="form-control" required="required">

            </div>

            <div class="mb-3">

                <label>Jurusan</label>

                <input type="text" name="jurusan" class="form-control" required="required">

            </div>

            <div class="mb-3">

                <label>No HP</label>

                <input type="text" name="no_hp" class="form-control" required="required">

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