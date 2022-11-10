<?php
    require"Tambah.php";
    if(isset($_POST['tambah'])){
        $Nama_Hotel = $_POST['Nama_Hotel'];
        $Alamat_Hotel = $_POST['Alamat_Hotel'];
        $Daerah_Hotel = $_POST['Daerah_Hotel'];
        $Harga = $_POST['Harga'];
        $gambar = $_FILES['gambar']['Nama_Hotel'];

        if ($gambar != ""){
            $ekstensi = array('jpg', 'png');
            $x = explode('.', $gambar);
            $extensi = strtolower(end($x));
            $Gambar_baru = "$Nama_Hotel.$extensi";
            $tmp = $_FILES['gambar']['tmp_name'];

            
            if(in_array($extensi, $ekstensi) === true) {
            move_uploaded_file($tmp, 'gambar/'.$Gambar_baru);

            $sql =  "INSERT INTO hotel VALUES ('','$Nama_Hotel','$Alamat_Hotel','$Daerah_Hotel','$Harga','$gambar')";
            $run = mysqli_query($db, $sql);  

        if($run){
            header('location: Tambah.php');
        }else{
            echo "GAGAL INPUT DATA!";
        }
    }

    }
}
?>