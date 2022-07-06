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
<body>
     
    <div class="container col-md-12 " style="margin-top: -10px">
       
            <div class="row g-0">
                <div class="col-md-10" style="margin:auto;">
                    <div class="card-body">
                    <div class= "container">
        <div class="">
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            ?>    
        </div>  
                    <div class="card-body text-center" id="name" >
                    <div class="card shadow-lg p-3 bg-body rounded" >
                        <h1 style="text-align: center; font-family:-apple-system; font-size: 25px; font-style: normal; font-family: sans-serif; "><b>Upload Buku</b></h1>
                        <h3>Rv<span>  E-Library</span></h3>
                                        <p class=""></p>
                                            <div class="row g-0">
                                                <div class="col-md-8" style= " margin:auto;">
                                                    <div class="card-body">
                                                    <form method="POST" action= "tambah_buku_proses.php" enctype=multipart/form-data>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="nama"><b>Nama Buku : </b></label>
                                                                <input type="text" class="form-control" id ="nama" name ="nama" placeholder="Nama" required>
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <label for="alamat"><b>Deskripsi Buku : </b></label>
                                                                <textarea class="form-control" id ="nama" name ="deskripsi" placeholder="deskripsi" required></textarea>
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <label for="email"><b>Cover Buku : </b></label>
                                                                <input type="file" class="form-control" name ="gambarbuku"  required>
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <label for="no_hp"><b>Kategori Buku : </b></label>
                                                                <input type="text" class="form-control" id ="no_hp" name ="kategori" placeholder="kategori" required>
                                                            </div>

                                                            <div class="card-footer text-right">
                                                                <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                                                                <input type="submit" name="submit" class="btn btn-success" value="UPLOAD BUKU" onclick="return confirm('Apakah Anda yakin ?')">
                                                            </div>
                                                          
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