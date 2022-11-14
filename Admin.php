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
    <link rel="stylesheet" href="Styling/admin.css">
    <title>Kelola Data</title>
</head>
<body>
<nav>
    <div class="layar-dalam">
      <div class="logo">
        <a href=""><img src="asset/Traveling.png" class="hitam"/></a>
      </div>
      <div class="menu">
        <a href="#" class="tombol-menu">
          <span class="garis"></span>
          <span class="garis"></span>
          <span class="garis"></span>
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#aboutus">About Us</a></li>
          <li><a href="index.php#gallery">Gallery</a></li>
          <li><a href="index.php#team">Team</a></li>
          <li><a href="index.php#blog">Blog</a></li>
          <li><a href="index.php#contact">Contact</a></li>
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
      <img src="asset/admin.png">
      <div class="posisi">
        <div class="card">
        <a href="Bus.php" class="btn-order">
            <div class="btn-block">
              Kelola Data Bus
            </div>
          </a>
          <a href="Hotel.php" class="btn-order">
            <div class="btn-block">
              Kelola Data hotel
            </div>
          </a>
        </div>
      </div>
    </div>
    <footer id="contact">
      <div class="layar-dalam">
        <div class="copy">
          © Copyright, Kelompok 8 Kelas B'21 Universitas Mulawarman
        </div>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>
</html>