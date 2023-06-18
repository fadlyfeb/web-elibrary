<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
    <!-- Favicons -->
  <link href="Gambar/LogoFix.png" rel="icon">
  <link href="Gambar/LogoFix.png" rel="apple-touch-icon">

  <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="frontend/styles/index.css" />
  <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/7e6ab84ec3.js" crossorigin="anonymous"></script>  
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    #formLogin .button{
      width: 80%;
      height: 40px;
      border-radius: 40px;
      background: #fff;
      color: black;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 1em;
      font-weight: 600;
    }
  
    #formLogin .button:hover{
      background-color: #071C4D;
      color: #fff;
    }
  </style>
  
</head>

<body style="background-color: #edeae3;">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <font style="color: white; font-weight: bold;">PERPUSTAKAAN 86</font></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#prosedur" style="color: white;">Prosedur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#layanan" style="color: white;">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang-kami" style="color: white;">Tentang Kami</a>
          </li>
        </ul>

        <!-- Desktop Buttons -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="regis" style="color: white;">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"id="login" style="color: white;">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="tamp-login">
   <!-- ======= Home ======= -->
  <main  id="home-menu">
    <section class="home">
      <video class="video-slide active" src="Gambar/2.mp4" autoplay muted loop></video>
        <div  id="swup" class="content active">
          <p style="padding-top: 30px ;"><font style="padding-left: 30px; font-weight: bold;">PERPUSTAKAAN 86 : </font>Learn from </br> <p style="padding-left: 30px; margin-top:-55px;">anywhere</p></p>
        </div>
    </section>     
     <!-- ======= End Home ======= -->
  </div>
  <div id="tamp">
     <!-- ======= Gradient Background ======= -->
    <section style="margin: 0px; padding:0%">
        <img src="Gambar/bg9.png" alt="Responsive Image"  style=" max-width: 100%; height: auto;">
    </section>
     <!-- ======= End Gradient Background ======= -->

    <!-- ======= Prosedur Section ======= -->
    <section id="prosedur" class="prosedur" style="margin-top: -90px;">
      <div class="container">
        <div class="col text-center section-prosedur" data-aos="fade-up" style="margin-bottom: 20px;">
          <h1 style="color: #071C4D;">Prosedur</h1>
        </div>
        <center>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <h3>Pendaftaran Anggota</h3>
            <img src="Gambar/ilus1.png" width="400px" height="450px" style="margin-top: -70px;">
            <p style="margin-top: -30px;">
              Untuk menjadi anggota perpustakaan kami, Anda perlu mengisi formulir pendaftaran yang tersedia di lokasi perpustakaan atau melalui website kami. Pastikan untuk menyediakan informasi yang valid dan lengkap.
            </p>
          </div>
          <div class="col-lg-6" data-aos="fade-left">
            <h3>Pengembalian Buku</h3>
            <img src="Gambar/alis4.png" width="350px" height="430px" style="margin-top: -60px;">
            <p style="margin-top: -25px;">
              Setelah Anda selesai membaca buku yang dipinjam, pastikan untuk mengembalikan buku tersebut tepat waktu. Tempat pengembalian buku tersedia di lantai utama perpustakaan. Keterlambatan pengembalian akan dikenakan denda.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <h3 style="margin-top: 50px;">Peminjaman Buku</h3>
            <img src="Gambar/ilus5.png" width="400px" height="450px" style="margin-top: -70px;">
            <p style="margin-top: -30px;">
              Setelah menjadi anggota, Anda dapat meminjam buku dari perpustakaan kami. Cari buku yang Anda inginkan melalui katalog online kami, lalu kunjungi perpustakaan untuk melakukan peminjaman. Batas peminjaman adalah 2 minggu.
            </p>
          </div>
          <div class="col-lg-6" data-aos="fade-left">
            <h3 style="margin-top: 49px;">Pembayaran Denda</h3>
            <img src="Gambar/ilus6.png" width="400px" height="450px" style="margin-top: -70px;">
            <p style="margin-top: -30px;">
              Jika Anda mengembalikan buku terlambat, Anda akan dikenakan denda sesuai dengan ketentuan perpustakaan. Pembayaran denda dapat dilakukan di meja pelayanan perpustakaan.
            </p>
          </div>
        </div>
      </center>
      </div>
    </section><!-- End Prosedur Section -->

    <!-- ======= layanan Section ======= -->
    <section id="layanan" class="layanan" >
      <div class="container">
        <div class="col text-center section-layanan" data-aos="fade-up" style="margin-bottom: 40px; margin-top: 40px;" >
          <h1 style="color: #071C4D;" >Layanan</h1>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-wifi"></i></div>
              <h4 class="title"><a href="">Wifi</a></h4>
              <p class="description">Tersedia WiFi gratis di perpustakaan kami! Jelajahi pengetahuan tanpa batas dengan koneksi internet yang cepat dan stabil.</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-bookmark"></i></i></div>
              <h4 class="title"><a href="">Pembatas Buku</a></h4>
              <p class="description">Dapatkan pembatas buku gratis dari perpustakaan kami! Mempercantik dan memudahkan perjalanan membaca Anda.</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bi bi-lock"></i></div>
              <h4 class="title"><a href="">Loker</a></h4>
              <p class="description">Nikmati kemudahan penyimpanan dengan loker gratis. Aman dan praktis untuk menyimpan barang-barang Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End layanan Section--->

    <!-- ======= Gradient Background ======= -->
    <section id="tamp"style="margin: 0px; padding:0%">
        <img src="Gambar/bg8.png" alt="Responsive Image"  style=" max-width: 100%; height: auto;">
    </section>
    <!-- ======= End Gradient Background ======= -->

    <!-- ======= Tentang Kami Section ======= -->
    <section id="tentang-kami" class="tentang-kami" style="background-color: #02bee8; margin-top:-90px;">
      <div class="container">
        <div class="col text-center section-tentang-kami" data-aos="fade-up" style="margin-bottom: 40px;">
          <h1 style="color: #071C4D;">Tentang Kami</h1>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="box-banner"">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="Gambar/tentangkami2.png" alt="First slide" height="310px">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="Gambar/tentangkami1.png" alt="Second slide" height="310px">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="Gambar/tentangkami3.png" alt="Third slide" height="310px">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left" style="margin-bottom:40px">
            <h3>Siapa Kami</h3>
            <p>
              Kami adalah Perpustakaan 86, sebuah institusi yang berdedikasi untuk memberikan akses pengetahuan dan informasi kepada siswa SMA Negeri 86 Jakarta. Kami menyediakan berbagai koleksi buku, jurnal, dan sumber daya elektronik untuk meningkatkan pembelajaran dan penelitian.
            </p>
            <h3 style="margin-top: 20px;">Visi dan Misi</h3>
            <p>
              Visi kami adalah menjadi pusat informasi dan pengetahuan yang unggul untuk pendidikan dan penelitian. Misi kami adalah memberikan akses yang mudah dan luas terhadap sumber daya informasi, mendukung perkembangan intelektual pengguna, dan menjadi mitra dalam proses pembelajaran di SMA Negeri 86 Jakarta.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End Tentang Kami Section -->
  </main>
  </div>
  <div id="popupForm" class="popup">
    <div class="form-box" id="formLogin">
      <div class="form-value">
        <div style="margin-top: -32px; margin-left: 360px;">
          <button class="btn-close" id="btnClose" type="button">
             X
          </button>
        </div>
        <center>
        <h1>Form Login</h1>
        <div style="color: white;">
          <?php
            if(isset($_COOKIE["message"])){
              echo $_COOKIE["message"];
            }
          ?>
        </div>
          <form method="post" action="proseslogin.php">
            <div class="inputbox">
              <ion-icon name="mail-outline"></ion-icon>
              <input type="text" name="nisnip" placeholder="NIS/NIP"/>
            </div>
            <div class="inputbox">
                <input type="password" id="login-confirm-password" name="password" placeholder="Password"/>
                <span class="password-toggle" onclick="toggleLoginConfirmPasswordVisibility()">
                    <ion-icon id="login-confirm-password-icon" name="eye-outline"></ion-icon>
                </span>
            </div>
              <p><font color="white">Anda belum punya akun? <a id="a-regis"><font color="white"><b>Register</b></font></a></p><br>
              <input class="button" type="submit" name="login" value="Login"><br/><br/>
            </center>
          </form>
      </div>
    </div>
  </div>
  <div id="popupRegis" class="popup">
        <div class="form-box-regis" id="formRegis">
          <div class="form-value">
            <div style="margin-top: 10px; margin-left: 360px;">
              <button class="btn-close" id="btnClose-regis" type="button">
              X
              </button>
            </div>
              <center>
                <h2 style="margin-top: 5px;">Jenis Registrasi</h2>
                <input type="button" style="margin-top: 10px;" name="user_register" id= "btn-regis-user" value="Register User">
                <input type="button" style="margin-top: 10px;" name="admin_register"  id= "btn-regis-admin" value="Register Admin">
                <p style="margin-top: 15px;">Sudah memiliki akun? <a id="a-login"><font color="white"><b>Login</b><font></a></p><br>
                </center>
            </div>
        </div>
    </div>
    <div id="popupRegisAdmin" class="popup">
    <div class="form-box-admin">
            <div class="form-value">
                <h2>Form Registrasi Admin</h2>
                <center>
                  <div style = "color:red; margin-bottom:15px;">
                      <?php
                          if(isset($_COOKIE['message'])){
                              echo $_COOKIE['message'];
                          }
                      ?>
                  </div>
                </center>
                <form method="post" action="prosesregisteradmin.php">
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nama" placeholder="Nama"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nip" placeholder="NIP"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="man-outline"></ion-icon>
                        <ion-icon name="woman-outline"></ion-icon>
                        <select name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <input type="date" style="padding-left: 0px;" name="tanggal_lahir"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" name="nomor_hp" placeholder="Nomor HP"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <textarea name="alamat" style=" resize: none;" placeholder="Alamat"></textarea>
                    </div>
                    <div class="inputbox">
                        <input type="password" id="admin-password" name="password" placeholder="Password"/>
                        <span class="password-toggle" onclick="toggleAdminPasswordVisibility()">
                          <i id="admin-password-icon" class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="inputbox">
                      <div class="confirm-pw">
                        <input type="password" id="admin-confirm-password" name="confirm_password" placeholder="Konfirmasi Password"/>
                        <span class="password-toggle" onclick="toggleAdminConfirmPasswordVisibility()">
                          <ion-icon id="admin-confirm-password-icon" name="eye-outline" style="margin-top: -20px; margin-right:-10px;"></ion-icon>
                        </span>
                      </div>
                    </div>
                    <p style="margin-left:15px;" id="admin-error-message" class="error"></p>
                    <center>
                    <input class="button" type="submit" name="register" value="Register">
                    <input class="button" type="submit" name="batal" value="Batal">
                    </center>
                  </form>
            </div>
        </div>
    </div>
    <div id="popupRegisUser" class="popup">
    <div class="form-box-admin">
            <div class="form-value">
                <h2>Form Registrasi User</h2>
                <center>
                  <div style = "color:red; margin-bottom:15px;">
                      <?php
                          if(isset($_COOKIE['message'])){
                              echo $_COOKIE['message'];
                          }
                      ?>
                  </div>
                </center>
                <form method="post" action="prosesregisteruser.php">
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nama" placeholder="Nama"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nis" placeholder="NIS"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="man-outline"></ion-icon>
                        <ion-icon name="woman-outline"></ion-icon>
                        <select name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <input type="date" style="padding-left: 0px;" name="tanggal_lahir"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" name="nomor_hp" placeholder="Nomor HP"/>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <textarea name="alamat" style=" resize: none;" placeholder="Alamat"></textarea>
                    </div>
                    <div class="inputbox">
                        <input type="password" id="user-password" name="password" placeholder="Password"/>
                        <span class="password-toggle" onclick="toggleUserPasswordVisibility()">
                          <i id="user-password-icon" class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="inputbox">
                      <div class="confirm-pw">
                        <input type="password" id="user-confirm-password" name="confirm_password" placeholder="Konfirmasi Password"/>
                        <span class="password-toggle" onclick="toggleUserConfirmPasswordVisibility()">
                          <ion-icon id="user-confirm-password-icon" name="eye-outline" style="margin-top: -20px; margin-right:-10px;"></ion-icon>
                        </span>
                      </div>
                    </div>
                    <p style="margin-left:15px;" id="user-error-message" class="error"></p>
                    <center>
                    <input class="button" type="submit" name="register" value="Register">
                    <input class="button" type="submit" name="batal" value="Batal">
                    </center>
                  </form>
            </div>
        </div>
    </div>
    
  <script>
  // Script untuk mengatur posisi garis bawah saat kursor bergerak
  var navItems = document.querySelectorAll('.nav-item');
  navItems.forEach(function(navItem) {
    navItem.addEventListener('mousemove', function(e) {
      var boundingRect = this.getBoundingClientRect();
      var xPos = e.clientX - boundingRect.left;
      this.style.setProperty('--x', xPos + 'px');
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    AOS.init();
  });
// Login Pop Up
function toggleLoginPasswordVisibility() {
  var adminPasswordInput = document.getElementById("login-password");
  var adminPasswordIcon = document.getElementById("login-password-icon");

  if (adminPasswordInput.type === "password") {
    adminPasswordInput.type = "text";
    adminPasswordIcon.classList.remove("fa-eye");
    adminPasswordIcon.classList.add("fa-eye-slash");
  } else {
    adminPasswordInput.type = "password";
    adminPasswordIcon.classList.remove("fa-eye-slash");
    adminPasswordIcon.classList.add("fa-eye");
  }
}
  // Admin Pop Up
function toggleAdminPasswordVisibility() {
  var adminPasswordInput = document.getElementById("admin-password");
  var adminPasswordIcon = document.getElementById("admin-password-icon");

  if (adminPasswordInput.type === "password") {
    adminPasswordInput.type = "text";
    adminPasswordIcon.classList.remove("fa-eye");
    adminPasswordIcon.classList.add("fa-eye-slash");
  } else {
    adminPasswordInput.type = "password";
    adminPasswordIcon.classList.remove("fa-eye-slash");
    adminPasswordIcon.classList.add("fa-eye");
  }
}

function toggleAdminConfirmPasswordVisibility() {
  var adminConfirmPasswordInput = document.getElementById("admin-confirm-password");
  var adminConfirmPasswordIcon = document.getElementById("admin-confirm-password-icon");

  if (adminConfirmPasswordInput.type === "password") {
    adminConfirmPasswordInput.type = "text";
    adminConfirmPasswordIcon.setAttribute("name", "eye-off-outline");
  } else {
    adminConfirmPasswordInput.type = "password";
    adminConfirmPasswordIcon.setAttribute("name", "eye-outline");
  }
}

// User Pop Up
function toggleUserPasswordVisibility() {
  var userPasswordInput = document.getElementById("user-password");
  var userPasswordIcon = document.getElementById("user-password-icon");

  if (userPasswordInput.type === "password") {
    userPasswordInput.type = "text";
    userPasswordIcon.classList.remove("fa-eye");
    userPasswordIcon.classList.add("fa-eye-slash");
  } else {
    userPasswordInput.type = "password";
    userPasswordIcon.classList.remove("fa-eye-slash");
    userPasswordIcon.classList.add("fa-eye");
  }
}

function toggleUserConfirmPasswordVisibility() {
  var userConfirmPasswordInput = document.getElementById("user-confirm-password");
  var userConfirmPasswordIcon = document.getElementById("user-confirm-password-icon");

  if (userConfirmPasswordInput.type === "password") {
    userConfirmPasswordInput.type = "text";
    userConfirmPasswordIcon.setAttribute("name", "eye-off-outline");
  } else {
    userConfirmPasswordInput.type = "password";
    userConfirmPasswordIcon.setAttribute("name", "eye-outline");
  }
}

function toggleLoginConfirmPasswordVisibility() {
  var loginConfirmPasswordInput = document.getElementById("login-confirm-password");
  var loginConfirmPasswordIcon = document.getElementById("login-confirm-password-icon");

  if (loginConfirmPasswordInput.type === "password") {
    loginConfirmPasswordInput.type = "text";
    loginConfirmPasswordIcon.setAttribute("name", "eye-off-outline");
  } else {
    loginConfirmPasswordInput.type = "password";
    loginConfirmPasswordIcon.setAttribute("name", "eye-outline");
  }
}

// Admin Pop Up
var adminPasswordInput = document.getElementById("admin-password");
var adminConfirmPasswordInput = document.getElementById("admin-confirm-password");
var adminErrorMessage = document.getElementById("admin-error-message");

adminPasswordInput.addEventListener("input", checkAdminPasswordMatch);
adminConfirmPasswordInput.addEventListener("input", checkAdminPasswordMatch);

function checkAdminPasswordMatch() {
  var password = adminPasswordInput.value;
  var confirmPassword = adminConfirmPasswordInput.value;

  if (password !== confirmPassword) {
    adminErrorMessage.innerText = "Confirm password salah atau berbeda";
  } else {
    adminErrorMessage.innerText = "";
  }
}

// User Pop Up
var userPasswordInput = document.getElementById("user-password");
var userConfirmPasswordInput = document.getElementById("user-confirm-password");
var userErrorMessage = document.getElementById("user-error-message");

userPasswordInput.addEventListener("input", checkUserPasswordMatch);
userConfirmPasswordInput.addEventListener("input", checkUserPasswordMatch);

function checkUserPasswordMatch() {
  var password = userPasswordInput.value;
  var confirmPassword = userConfirmPasswordInput.value;

  if (password !== confirmPassword) {
    userErrorMessage.innerText = "Confirm password salah atau berbeda";
  } else {
    userErrorMessage.innerText = "";
  }
}


  </script>
  <script src="frontend/libraries/jquery/jquery-3.6.3.min.js"></script>
  <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="frontend/scripts/scriptIndex.js"></script>
</body>
</html>
