<?php 
    session_start();
    require "Koneksi.php";
    $ID = $_GET['id'];
    $Jenis = $_GET['jenis'];
    $status = 'Lunas';
    if($Jenis == 'hotel'){
        $sql = "UPDATE Transaksi SET Status_Pesan = '$status' WHERE ID_Hotel = '$ID'";
        $result = mysqli_query($db, $sql);
        if ($result){
            echo
            "<script>
            alert('Data Berhasil Di Update . . .');
            document.location.href = 'Admin.php';
            </script>";
        }else{
            echo"
                <script>
                    alert('Data Gagal Di Update . . .');
                    document.location.href = 'Konfirmasi_Hotel.php';
                </script>
            ";
        }
    }else
    if ($Jenis == 'bus') {
        $sql = "UPDATE Transaksi SET Status_Pesan = '$status' WHERE ID_Bus = '$ID'";
        $result = mysqli_query($db, $sql);
        if ($result){
            echo
            "<script>
            alert('Data Berhasil Di Update . . .');
            document.location.href = 'Admin.php';
            </script>";
        }else{
            echo"
                <script>
                    alert('Data Gagal Di Update . . .');
                    document.location.href = 'Konfirmasi_Bus.php';
                </script>
            ";
        }
    }

?>