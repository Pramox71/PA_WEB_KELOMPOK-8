<?php session_start(); 
    require "Koneksi.php";
    $result = mysqli_query($db, "SELECT ID_Bus, Nama_Bus AS nama, Daerah_Terminal AS daerah, Tujuan, Harga, Gambar FROM bus");
    $bus = [];
    while ($row = mysqli_fetch_assoc($result)){
      $bus[] = $row;    
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
        <a href=""><img src="asset/bus.png" class="hitam"/></a>
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
          <?php foreach ($bus as $data):?>
          <div class="card">
            <div class="img-card">
              <img src="Bus_img/<?= $data['Gambar'];?>" class ="img"/>
            </div>
            <div class="content-text">
              <h2><?php echo $data['nama'];?></h2>
              <h2 class="harga">Rp. <?php echo number_format($data['Harga'],0,'.','.');?></h2>
              <small class="alamat"><?php echo $data['daerah'];echo' Tujuan '; echo $data['Tujuan'];?></small>
              <br>
              <div class="btn-block">
                <a href="Transaksi.php?id=<?php echo $data['ID_Bus'];?>&harga=<?php echo $data['Harga'];?>&jenis=bus" onclick = "return confirm('Apakah Anda Yakin memesan Hotel <?php echo $data['nama']; ?>?')" class="btn-order">Pesan</a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>
</html>