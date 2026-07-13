<?php

include "../../config/config.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM peminjaman WHERE id_pinjam='$id'");

echo "<script>

alert('Data peminjaman berhasil dihapus');

window.location='index.php';

</script>";

?>