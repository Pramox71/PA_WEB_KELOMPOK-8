<?php session_start(); 
    if ($_SESSION['priv'] != 'ADMIN'){
      header("Location: ../");
    }
    require "Koneksi.php";
    $result = mysqli_query($db, "SELECT ID_Hotel, Nama_Hotel AS nama, Alamat_Hotel AS alamat, Daerah_Hotel AS daerah, Harga, Gambar FROM hotel");
    $hotel = [];
    while ($row = mysqli_fetch_assoc($result)){
      $hotel[] = $row;    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/tambah.css">
    <title>Kelola Data</title>
</head>
<body>
<nav>
    <div class="layar-dalam">
      <div class="logo">
        <a href=""><img src="asset/hotel.png" class="hitam"/></a>
      </div>
      <div class="menu">
        <a href="#" class="tombol-menu">
          <span class="garis"></span>
          <span class="garis"></span>
          <span class="garis"></span>
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><?php
            if (isset($_SESSION['username'])){
              echo "<a href='Logout.php'>Log Out</a>";
            }else{
              echo "<a href='Login.php'>Log In</a>";
            }
          ?></li>
          <li><?php
                if ($_SESSION['priv'] == 'ADMIN') {
                    echo("<a href='Admin.php'>Kelola Data</a>");
                }else if($_SESSION['priv'] == 'member'){
                    echo("<a href='user.php'>Data Diri</a>");
                }
                ?>
          </li>
          <?php
          if (isset($_SESSION['username'])){
            $user = $_SESSION['username'];
            $query = mysqli_query($db, "SELECT * FROM akun_travel WHERE username = '$user'");
            if ($nama_user = mysqli_fetch_assoc ($query)){
              echo "<li><a href='#'>$user</a></li>";}
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="layar-penuh">
    <div class="tampilan">
        <div class="posisi">
          <?php foreach ($hotel as $data):?>
          <div class="card">
            <div class="img-card">
              <img src="Hotel_img/<?= $data['Gambar'];?>" class ="img"/>
            </div>
            <div class="content-text">
              <h2><?php echo $data['nama'];?></h2>
              <h2 class="harga">Rp. <?php echo number_format($data['Harga'],0,'.','.');?></h2>
              <small class="alamat"><?php echo $data['alamat'];echo', '; echo $data['daerah'];?></small>
              <br>
              <div class="btn-block">
                <a href="Edit.php?id=<?php echo $data['ID_Hotel'];?>&jenis=hotel" class="btn-order">Edit</a>
              </div>
              <div class="btn-block">
                <a href="hapus.php?id=<?php echo $data['ID_Hotel'];?>&jenis=hotel" onclick = "return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn-order">Hapus</a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          <div class="card">
              <div class="btn-block">
                <a href="Tambah_hotel.php" class="btn-order">Tambah Data</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>
</html>