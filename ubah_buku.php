<?php

    include("connection.php");

    if (!$_SESSION['login']) {
        header("location: index.php");
    }
        $statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE ID =".$_GET['id'] );
        oci_execute($statement);
        while($row = oci_fetch_array($statement)) {
            $id = $row['ID'];
            $nama = $row['NAMA'];
            $username = $row['DESKRIPSI'];
            $image = $row['IMAGE'];
            $kategori = $row['KATEGORI'];
            
            
            
            
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
            <h3 class="text-center"><b>Edit Buku : <?php echo $nama;?></b></h3>
            <hr>
        </div>
        <div class="card mt-5">
                        <form method="POST" action= "ubah_buku_proses.php"  enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $id; ?>" placeholder="contoh" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar"><b>Cover Buku : </b></label>
                                    <br><img src="img/<?php echo $image;?>" class="w-25">
                                    <input type="file" class="form-control p-2"  style="border:none" id="gambar" name="gambarbuku" placeholder="Pilih file...">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="username"><b>Nama Buku : </b></label>
                                    <input type="text" class="form-control" id="username" name="nama" value="<?php echo $nama; ?>">
                                </div> 
                                <div class="form-group mt-3">
                                    <label for="alamat"><b>Deskripsi Buku : </b></label>
                                    <textarea class="form-control" id="username" name="deskripsi" placeholder="Masukkan Alamat..." required><?php echo $username; ?></textarea>
                                </div>                             
                                <div class="form-group mt-3">
                                    <label for="username"><b>Kategori Buku : </b></label>
                                    <input type="text" class="form-control" id="username" name="kategori" value="<?php echo $kategori; ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                                    <input type="submit" name="submit" class="btn" onclick="return confirm('Apakah Anda Yakin?')" style="background: #2E8B57; color: white;" value="Edit Data Buku">
                                </div>
                            </div>
                        </form>
                    </div>
        
        
   
  
    </div>

<?php include('js.php'); ?>    
</body>
</html>