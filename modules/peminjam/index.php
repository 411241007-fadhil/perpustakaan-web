<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

$keyword = "";

if(isset($_GET['cari'])){

    $keyword = mysqli_real_escape_string($conn,$_GET['keyword']);

    $query = "SELECT * FROM peminjam
              WHERE nama LIKE '%$keyword%'
              OR nim LIKE '%$keyword%'
              OR jurusan LIKE '%$keyword%'
              ORDER BY id_peminjam DESC";

}else{

    $query = "SELECT * FROM peminjam
              ORDER BY id_peminjam DESC";

}

$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);
?>

<div class="card shadow">

    <div class="card-header bg-success text-white">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-0">👤 Data Peminjam</h3>

                <small>Total Peminjam :
                    <?= $total ?></small>

            </div>

            <a href="tambah.php" class="btn btn-light">

                + Tambah Peminjam

            </a>

        </div>

    </div>

    <div class="card-body">

        <form method="GET" class="row g-2 mb-4">

            <div class="col-md-9">

                <input
                    type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="Cari nama, NIM, atau jurusan..."
                    value="<?= htmlspecialchars($keyword) ?>">

            </div>

            <div class="col-md-2 d-grid">

                <button class="btn btn-success" name="cari">

                    Cari

                </button>

            </div>

            <div class="col-md-1 d-grid">

                <a href="index.php" class="btn btn-secondary">

                    Reset

                </a>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>No HP</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

if(mysqli_num_rows($data)>0){

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td><?= $row['nama'] ?></td>

                        <td><?= $row['nim'] ?></td>

                        <td><?= $row['jurusan'] ?></td>

                        <td><?= $row['no_hp'] ?></td>

                        <td>

                            <a href="edit.php?id=<?= $row['id_peminjam'] ?>" class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <a
                                href="hapus.php?id=<?= $row['id_peminjam'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')">

                                Hapus

                            </a>

                        </td>

                    </tr>

                <?php

}

}else{

?>

                    <tr>

                        <td colspan="6" class="text-center text-danger">

                            Data peminjam tidak ditemukan.

                        </td>

                    </tr>

                    <?php

}

?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php
include "../../includes/footer.php";
?>