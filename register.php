<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("head.php"); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body class="bg-primary">
    <div class= "container">
        <div class="">
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            ?>    
        </div>   
    <div class="container col-md-12 " style="margin-top: -10px">
            <div class="row g-0">
                <div class="col-md-10" style="margin:auto;">
                <div class="card mb-4 shadow-lg  mb-5" style="  margin: auto; border-radius: 30px; margin-top:60px;"  id="kategori">
                                <div class="card-body text-center" id="name" style="border-radius:100px;" >
                        <h1 style="text-align: center; font-family:-apple-system; font-size: 25px; font-style: normal; font-family: sans-serif; "><b>Daftar</b></h1>
                        <h2>Rv <span>E-Library</span></h2>
                                        <p">Pusat Buku Gratis Untuk Dibaca</p>
                                            <div class="row g-0">
                                                <div class="col-md-8" style=  " margin:auto;">
                                                    <div class="card-body">
                                                    <form method="POST" action= "register_proses.php">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" class="form-control" id ="nama" name ="nama" placeholder="Nama" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Username</label>
                                                                <input type="text" class="form-control" id ="nama" name ="username" placeholder="Username" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id ="email" name ="email" placeholder="Email" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="no_hp">No HP</label>
                                                                <input type="number" class="form-control" id ="no_hp" name ="no_hp" placeholder="No HP" required>
                                                            </div>
                                            
                                                            <div class="form-group">
                                                                <label for="nama">Password</label>
                                                                <input type="password" class="form-control" id ="nama" name ="password" placeholder="Password" required>
                                                            </div>

                                                            <div class="card-footer text-right">
                                                                <!-- <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button> -->
                                                                <input type="submit" name="submit" class="btn btn-success" value="DAFTAR" onclick="return confirm('Apakah Anda yakin ?')">
                                                            </div>
                                                            <p class="mt-5">
                                                                        Sudah Punya Akun ? <a href="index.php" class="text-decoration-none">Log In di sini</a></p>
                                                        </div>
                                                    </form>    
                                                </div>
                                            </div>
                                </div>
                            </div>   
                    </div>
                </div>
            </div>
       
    </div>
    <?php  include('js.php');?> 
</body>
</html>