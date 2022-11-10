<?php
require 'Koneksi.php';
$result = mysqli_query($db, "SELECT * FROM hotel" );
$hotel = [];

while ($row = mysqli_fetch_assoc($result)){
    $hotel[] = $row;
}
?>

<html>
    <head>
        <title>HALAMAN INPUT DATA</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wraper" id="title-id">
            <div class="title">DATA HOTEL</div>
            <div class="sidebar-left">
                <form class="form" action="aksi.php" method="POST">
                    <input type="text" name="Nama_Hotel" placeholder="Nama Hotel" class="input" required><br>
                    <input type="text" name="Alamat_Hotel" placeholder="Alamat Hotel" class="input" required><br>
                    <input type="text" name="Daerah_Hotel" placeholder="Daerah Hotel" class="input" required><br>
                    <input type="number" name="Harga" placeholder="Harga" class="input" required><br>
                    <input type="file" name="gambar" class="input" required><br>
                    <input type="submit" name="tambah" value="simpan data"  class="btn">
                </form>
        </div>
        <div class ="sidebar-right">
            <div style="padding:20px>
                <span style="font-size:20px;"> DATA HOTEL </span>
                <table class="table1">
                     <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama Hotel</th>
                        <th width="15%">Alamat </th>
                        <th width="10%">Daerah</th>
                        <th width="10%">Harga</th>
                        <th width="15%">Gambar</th>
                        <th width="15%">Aksi</th>
                    </tr>
                    <?php $i = 1; foreach($hotel as $htl) :?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $htl['Nama_Hotel']; ?></td>
                        <td><?php echo $htl['Alamat_Hotel']; ?></td>
                        <td><?php echo $htl['Daerah_Hotel']; ?></td>
                        <td><?php echo $htl['Harga']; ?></td>
                        <td><img src="asset/<?php echo $htl['gambar']; ?>"></td>
                        <td>
                            <a href="edit.php?id=<?php echo $htl["ID_Hotel"]; ?>" class="aksi green">Ubah</a>
                            <a href="hapus.php?id=<?php echo $htl["ID_Hotel"]; ?>" onclick="return confirm('Apakah Data Ingin Dihapus?');" class="aksi red">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </table>   
            </div>
        </div>             
        <div style="clear:both;"></div>  

    </body>

</html>