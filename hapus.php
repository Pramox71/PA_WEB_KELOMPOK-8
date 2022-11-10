<?php
require 'Koneksi.php';

$ID_Hotel = $_GET['ID_Hotel'];

$result = mysqli_query($db, "DELETE FROM hotel WHERE ID_Hotel = $ID_Hotel");

if ($result) {
    header('location: Tambah.php');
}else{
    echo "
    <script>
    allert('Data Telah Di Perbarui');
    document.location.href = 'Edit.php?id=$id';
    </script>";
}
?>  