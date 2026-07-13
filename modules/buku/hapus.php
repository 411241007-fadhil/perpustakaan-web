<?php

include "../../config/config.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");

echo "<script>
        alert('Data berhasil dihapus');
        window.location='index.php';
      </script>";

?>