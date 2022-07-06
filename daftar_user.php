<?php
include('connection.php');
if (!$_SESSION['login']){
    header("location: index.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_DAFTAR WHERE DEL_FLAGE = 0");
oci_execute($statement);
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
                <div class="title" style="text-color=blue;" >RV E-Library</div>
                    
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    
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
            <h3 class="text-center"><i class="fas fa-users"></i>DAFTAR USER</h3><hr>
                    <?php 
                        if(!empty($_SESSION['message'])){
                            echo $_SESSION['message'];
                            $_SESSION['message'] = null;
                        }
                    ?>    
                    <a class = "btn btn-success mb-4" href="tambah_user.php"><i class="fas fa-plus"></i>  Tambah User</a>
                    <table class="table table-bordered table-success">
                        <thead>
                            <tr class="text-center">
                                <td><b>No</b></td>
                                <td><b>Nama</b></td>
                                <td><b>Username</b></td>
                                <td><b>E-Mail</b></td>
                                <td><b>No HP</b></td>
                                <td><b>Password</b></td>
                                <td><b>Aksi</b></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            while($row = oci_fetch_array($statement)){
                                echo '<tr>';
                                echo '<td>'.$no++.'</td>';
                                echo '<td>'.$row['NAMA'].'</td>';
                                echo '<td>'.$row['USERNAME'].'</td>';
                                echo '<td>'.$row['EMAIL'].'</td>';
                                echo '<td>'.$row['NO_HP'].'</td>';
                                echo '<td>'.$row['PASSWORD'].'</td>';
                                echo '<td><a href="ubah_user.php?id='.$row['ID'].'" class="btn btn-warning btn-block">ubah</a>
                                <a href="detail_user.php?id='.$row['ID'].'" class="btn btn-primary btn-block">Detail</a>
                                <a href="deleted_user.php?id='.$row['ID'].'" onclick="return confirm(\'apakah anda yakin?\')" class="btn btn-danger btn-block">Delete</a>';
                            }
                        ?>
                        </tbody>
                     </table>   
            </div>
        </div>
        <?php include('js.php');?>
    </body>
</html>
</html>