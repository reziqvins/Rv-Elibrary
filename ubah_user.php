<?php
   include('connection.php');
    if(!$_SESSION['login']){
        header("location: index.php");
    }

    $statement = oci_parse($connection, "SELECT * FROM TB_DAFTAR WHERE ID =".$_GET['id']);
    oci_execute($statement);
    while($row = oci_fetch_array($statement)){
        $id = $row['ID'];
        $nama = $row['NAMA'];
        $username = $row['USERNAME'];
        $email = $row['EMAIL'];
        $no_hp = $row['NO_HP'];
        $password = $row['PASSWORD'];
    }
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
        <div class="pt-5">
            <h3 class="text-center"><b>Edit User : <?php echo $nama; ?></b></h3>
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            
            ?>    
        </div>    
        <div class="card mt-5">
            <form method="POST" action= "ubah_user_proses.php">
                <div class="card-body">
                <div class="form-group" >  
                        <input type="text" class="form-control" id ="id" name ="id" placeholder="Masukkan Nama..." value ="<?php echo $id; ?>" hidden>
                    </div>
                     <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id ="nama" name ="nama" placeholder="Masukkan Nama..." value ="<?php echo $nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input type="text" class="form-control" id ="username" name ="username" placeholder="Masukkan Username..." value ="<?php echo $username; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id ="email" name ="email" value ="<?php echo $email ?>" placeholder="Masukkan Email..." required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="number" class="form-control" id ="no_hp" name ="no_hp" value ="<?php echo $no_hp; ?>" placeholder="Masukkan No HP..." required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Password</label>
                        <input type="password" class="form-control" id ="password" name ="password" value ="<?php echo $password; ?>" placeholder="Masukkan Password..." required>
                    </div>
                    
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Edit User" onclick="return confirm('Apakah Anda yakin ?')">
                    </div>
                    
                </div>
            </form>    

        </div>
        
    </div>
    <?php include('js.php'); ?>
    
</body>
</html>
