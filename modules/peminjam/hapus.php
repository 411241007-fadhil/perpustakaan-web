<?php

include "../../config/config.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM peminjam WHERE id_peminjam='$id'");

echo "<script>

alert('Data berhasil dihapus');

window.location='index.php';

</script>";

?>