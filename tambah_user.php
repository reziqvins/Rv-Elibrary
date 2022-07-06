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
                    <div class="card-body">
                    <div class="card-body text-center" id="name" >
                    <div class="card shadow-lg p-3 bg-body rounded" >
                        <h1 style="text-align: center; font-family:-apple-system; font-size: 25px; font-style: normal; font-family: sans-serif; "><b>Tambah User</b></h1>
                                    <h2><b>FR</b>Library</h2>
                                            <div class="row g-0">
                                                <div class="col-md-8" style=  " margin:auto;">
                                                    <div class="card-body">
                                                    <form method="POST" action= "tambah_user_proses.php">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="nama"><b>Nama User : </b></label>
                                                                <input type="text" class="form-control" id ="nama" name ="nama" placeholder="Nama" required>
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <label for="nama"><b>Username User : </b></label>
                                                                <input type="text" class="form-control" id ="username" name ="username" placeholder="Username" required>
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <label for="email"><b>E-Mail User : </b></label>
                                                                <input type="email" class="form-control" id ="email" name ="email" placeholder="Email" required>
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <label for="no_hp"><b>No HP User : </b></label>
                                                                <input type="number" class="form-control" id ="no_hp" name ="no_hp" placeholder="No HP" required>
                                                            </div>
                                            
                                                            <div class="form-group mt-3">
                                                                <label for="nama"><b>Password User : </b></label>
                                                                <input type="password" class="form-control" id ="nama" name ="password" placeholder="Password" required>
                                                            </div>

                                                            <div class="card-footer text-right">
                                                                <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                                                                <input type="submit" name="submit" class="btn btn-success" value="Tambah User" onclick="return confirm('Apakah Anda yakin ?')">
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