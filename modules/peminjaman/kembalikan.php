<?php

include "../../config/config.php";

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE peminjaman
SET
status='Dikembalikan',
tanggal_kembali=CURDATE()
WHERE id_pinjam='$id'
");

echo "<script>

alert('Buku berhasil dikembalikan');

window.location='index.php';

</script>";

?>