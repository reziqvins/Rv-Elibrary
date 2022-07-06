<?php

    include("connection.php");

    if (!$_SESSION['login']) {
        header("location: index.php");
    }


    

        $statement = oci_parse($connection, "SELECT * FROM TB_DAFTAR WHERE ID =".$_SESSION['ID'] );
        oci_execute($statement);
        while($row = oci_fetch_array($statement)) {
            $id = $row['ID'];
            $nama = $row['NAMA'];
            $username = $row['USERNAME'];
            $email = $row['EMAIL'];
            $no_hp = $row['NO_HP'];
            $password = $row['PASSWORD'];
            $gambar = $row['IMAGE'];
        
    }

   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
</head>
<body>
    
    <div class="container">
        <div class="pt-5">
            <h3 class="text-center"><b>Profil</b></h3>
        </div>
        <div class="card mt-3">
                        <form method="POST" action= "profil_pengguna_proses.php"  enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $id; ?>" placeholder="contoh" required>
                                </div>
                                <center>
                                <div class="form-group">
                                    <label for="gambar"><b>Foto Profil : </b></label>
                                    <br><img src="img/<?php echo $gambar;?>" style="width:100px;" class="w-15 rounded-circle img-thumbnail shadow-sm">
                                    <input type="file" class="form-control p-2"  style="border:none" id="gambar" name="gambarbuku" placeholder="Pilih file...">
                                </div>
                                </center>
                                
                                <div class="form-group mt-3">
                                    <label for="username"><b>Nama : </b></label>
                                    <input type="text" class="form-control" id="username" name="nama" value="<?php echo $nama; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="username"><b>Username : </b></label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="username"><b>E-Mail : </b></label>
                                    <input type="text" class="form-control" id="username" name="email" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="username"><b>No HP : </b></label>
                                    <input type="text" class="form-control" id="username" name="no_hp" value="<?php echo $no_hp; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password"><b>Password : </b></label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                                    <input type="submit" name="submit" class="btn" onclick="return confirm('Apakah Anda Yakin?')" style="background: #2E8B57; color: white;" value="Edit Profil">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            </div>    

<?php include('js.php'); ?>    
</body>
</html> 