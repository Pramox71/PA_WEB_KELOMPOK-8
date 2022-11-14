<?php
require 'Koneksi.php';

$ID = $_GET['id'];
$Jenis =$_GET['jenis'];
if($Jenis == 'hotel'){
    $result = mysqli_query($db, "DELETE FROM hotel WHERE ID_Hotel = $ID");
}else if($Jenis == 'bus'){
    $result = mysqli_query($db, "DELETE FROM bus WHERE ID_Bus = $ID");
}else{
    echo "ID Jenis Tidak Ada";
}

if ($result) {
    header('location: Admin.php');
}else{
    echo "
    <script>
    allert('Data Gagal di Hapus');
    document.location.href = 'Admin.php?id=$ID';
    </script>";
}
?>  