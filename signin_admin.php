<?php

    include('connection.php');
    if(isset($_SESSION['login'])){
        header("location:profil_admin.php");
    }
    $pesan = NULL;
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            $pesan = '<div class ="alert alert-danger" role="alert"> Login Gagal! Username atau password salah !! </div>' ;
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>

    
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins"rel="stylesheet"/>

</head>

<body class="bg-primary" style="font-family: Poppins;font-size: 16px;" class="bg-primary">
<div class="container col-md-10">
            <div class="row g-0">
                <div class="col-md-6" style="margin:auto;">
                <div class="card mb-4 shadow-lg  mb-5" style="  margin: auto; border-radius: 30px; margin-top:60px;"  id="kategori">
                                <div class="card-body text-center" id="name" style="border-radius:100px;" >
                                    <p>Log In Admin</p>
                                    <h2>Rv <span>E-Library</span></h2>
                                    <p class="mt-3">Pusat Buku Gratis Untuk Dibaca</p>
                                    <form class="form-signin" action="signin_proses_admin.php" method="POST">
                                    <?php  echo $pesan; ?>

                                    <div class="row mt-3">
                                        <div class="col-md-12 col-sm-12 col-12 d-grid gap-2">
                                            <div class="mb-3">
                                                <input type="text" id="username" class="form-control" name="username" placeholder="Username"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="mb-3">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                    </div>     

                                    <div class="row">
                                    <div class="col-md-6 col-sm-12 col-12 d-grid gap-2" style="margin:auto;">
                                        <input type="submit" class="btn btn-success" name="login" value="Login"/>
                                    </div>
                                </div>
                                <p class="mt-5">
                                        User ? <a href="index.php" class="text-decoration-none">Log In di sini</a></p>
                                    </form>
                                   
                            </div>
                    </div>
                </div>
            </div>
        </div>
    

    <?php  include('js.php');?> 
</body>
</html>



