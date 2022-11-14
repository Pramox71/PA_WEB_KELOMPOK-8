<?php
    session_start();
    date_default_timezone_set('asia/kuala_lumpur');
    require "Koneksi.php";
    $ID = $_SESSION['ID'];
    $Jenis = $_GET['jenis'];
    $waktu = date("l d-m-y - H:i:s");
    if($Jenis == 'hotel'){
        $ID_HOTEL = $_GET['id'];
        $ID_BUS = NULL;
    }elseif ($Jenis == 'bus') {
        $ID_HOTEL = NULL;
        $ID_BUS = $_GET['id'];
    }
    
    $biaya = $_GET['harga'];
    $cek = mysqli_query($db, "SELECT * FROM biodata WHERE ID_User = $ID");
    if (mysqli_num_rows($cek)==0){
        echo
            "<script>
            alert('Isi BioData Terlebih Dahulu. . .');
            document.location.href = 'Biodata.php';
            </script>";
    }else{
        $sql = "INSERT INTO Transaksi VALUES ('', '$ID', '$ID_HOTEL', '$ID_BUS', '$biaya', 'Belum Lunas', '$waktu')";
        $result = mysqli_query($db, $sql);
        if ($result){
            echo
            "<script>
            alert('Data Transaksi Di Tambahkan . . .');
            document.location.href = 'index.php';
            </script>";
        }
        else{
            echo"
                <script>
                    alert('Data Gagal Di Tambahkan . . .');
                    document.location.href = 'Pemesanan.php';
                </script>
            ";
        }
    }