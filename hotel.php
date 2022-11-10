<?php session_start(); 
    require "Koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/user.css">
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
          <li><a href="index.php#team">Team</a></li>
          <li><a href="hotel.php">Hotel</a></li>
          <li><a href="Logout.php">Logout</a></li>
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
    <!-- <header id="home">
      <img src="asset/blog1.jpg" width="100%">
    </header> -->
    <div class="posisi">
      <div class="card">
        <div class="img-card">
          <img src="asset/hotel-1.jpg" class ="img"/>
        </div>
        <div class="content-text">
          <h2>Hotel Maxwell</h2>
          <h2 class="harga">Rp. 250.000/Malam</h2>
          <small class="alamat">Jl. Kusuma Bangsa, Bali</small>
          <br>
          <div class="btn-block">
            <a href="Edit.php" class="btn-order">Pesan</a>
          </div>
        </div>
      </div>
      <div class="posisi">
      <div class="card">
        <div class="img-card">
          <img src="asset/hotel-1.jpg" class ="img"/>
        </div>
        <div class="content-text">
          <h2>Hotel Maxwell</h2>
          <h2 class="harga">Rp. 250.000/Malam</h2>
          <small class="alamat">Jl. Kusuma Bangsa, Bali</small>
          <br>
          <div class="btn-block">
            <a href="Edit.php" class="btn-order">Pesan</a>
          </div>
        </div>
      </div>
      <div class="posisi">
      <div class="card">
        <div class="img-card">
          <img src="asset/hotel-1.jpg" class ="img"/>
        </div>
        <div class="content-text">
          <h2>Hotel Maxwell</h2>
          <h2 class="harga">Rp. 250.000/Malam</h2>
          <small class="alamat">Jl. Kusuma Bangsa, Bali</small>
          <br>
          <div class="btn-block">
            <a href="Edit.php" class="btn-order">Pesan</a>
          </div>
        </div>
      </div>
      
      <!-- <div class="card">
          <div class="btn-block">
            <a href="Tambah.php" class="btn-order">Tambah Data</a>
          </div>
      </div> -->
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>
</html>