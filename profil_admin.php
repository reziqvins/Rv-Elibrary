<?php

include("connection.php");
if (!$_SESSION['login']) {
    header("location: index.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_ADMIN");
oci_execute($statement);
while($row = oci_fetch_array($statement)) {
    $id = $row['ID'];
    $username = $row['USERNAME'];
    $password = $row['PASSWORD'];
    $gambar = $row['FOTO'];
   
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <?php include('head.php');?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="sidebar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                <div class="title">RV E-Library</div>
                    
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                    <br><img src="img/<?php echo $gambar;?>" class="rounded-circle img-thumbnail shadow-sm"style = "width:120px;" >
                   
                    </center>
                    <li class="item">
                        <a href="profil_admin.php" class="menu-btn">
                        <i class="fas fa-user-alt"></i><span>Profil Admin</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="home_admin.php" class="menu-btn">
                        <i class="fas fa-book"></i><span>Daftar Buku</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="daftar_user.php" class="menu-btn">
                        <i class="fas fa-users"></i><span>Daftar User</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="logout.php" class="menu-btn">
                        <i class="fas fa-sign-out-alt"></i><span>Keluar</span>
                        </a>
                    </li>
                   
                </div>
            </div>
            <!--sidebar end-->
            <div class="main-container">
            <h2 class="text-center">Profil Administrator</h2>
                       <p class="text-center">selamat datang <?php echo $username; ?>
                        </p>
                    <?php if(!empty($_SESSION['message'])){
                            echo $_SESSION['message'];
                            $_SESSION['message'] = null;
                        }
                    ?>
                    <div class="card mt-3">
                        <form method="POST" action= "profi_admin_proses.php"  enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $id; ?>" placeholder="contoh" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar"><b>Foto Profil : </b></label>
                                    <br><img src="img/<?php echo $gambar;?>" class="w-25 rounded-circle img-thumbnail shadow-sm">
                                    <input type="file" class="form-control p-2"  style="border:none" id="gambar" name="gambarbuku" placeholder="Pilih file...">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="username"><b>Username Admin : </b></label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password"><b>Password Admin : </b></label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <input type="submit" name="submit" class="btn" onclick="return confirm('Apakah Anda Yakin?')" style="background: #2E8B57; color: white;" value="Edit Profil">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <?php include('js.php');?>
    </body>
