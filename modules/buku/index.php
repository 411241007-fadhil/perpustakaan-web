<?php
include "../../config/config.php";
include "../../includes/header.php";
include "../../includes/navbar.php";

$keyword = "";

if (isset($_GET['cari'])) {

    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);

    $query = "SELECT * FROM buku
              WHERE judul LIKE '%$keyword%'
              OR penulis LIKE '%$keyword%'
              OR penerbit LIKE '%$keyword%'
              ORDER BY id_buku DESC";

} else {

    $query = "SELECT * FROM buku ORDER BY id_buku DESC";

}

$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
?>

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-0">📚 Data Buku</h3>
                <small>Total Buku : <?= $total; ?></small>

            </div>

            <a href="tambah.php" class="btn btn-light">
                + Tambah Buku
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
                    placeholder="Cari berdasarkan judul, penulis atau penerbit..."
                    value="<?= htmlspecialchars($keyword); ?>">

            </div>

            <div class="col-md-2 d-grid">

                <button
                    type="submit"
                    name="cari"
                    class="btn btn-primary">

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

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th width="120">Tahun</th>
                        <th width="80">Stok</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php

                if(mysqli_num_rows($data) > 0){

                    $no = 1;

                    while($row = mysqli_fetch_assoc($data)){

                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $row['judul']; ?></td>

                        <td><?= $row['penulis']; ?></td>

                        <td><?= $row['penerbit']; ?></td>

                        <td><?= $row['tahun_terbit']; ?></td>

                        <td><?= $row['stok']; ?></td>

                        <td>

                            <a
                                href="edit.php?id=<?= $row['id_buku']; ?>"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <a
                                href="hapus.php?id=<?= $row['id_buku']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')">

                                Hapus

                            </a>

                        </td>

                    </tr>

                <?php

                    }

                }else{

                ?>

                    <tr>

                        <td colspan="7" class="text-center text-danger">

                            Data buku tidak ditemukan.

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