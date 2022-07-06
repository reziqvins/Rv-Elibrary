<?php
    include('connection.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id_admin'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        $updated_at = date('Y-m-d H:i:s');
        include('file.php');

        $statementdata = oci_parse($connection,"SELECT * FROM TB_ADMIN WHERE ID = '$id'");
        oci_execute($statementdata);
        $row = oci_fetch_array($statementdata);
        $imagelawas = $row['IMAGE'];
        

        $statement = oci_parse($connection,"UPDATE TB_BUKU SET NAMA='$nama',DESKRIPSI='$deskripsi',KATEGORI='$kategori', UPDATE_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), IMAGE='$upload' WHERE ID='$id'");
        $statement2 = oci_parse($connection,"UPDATE TB_BUKU SET NAMA='$nama',DESKRIPSI='$deskripsi',KATEGORI='$kategori', UPDATE_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID='$id'");

        if(move_uploaded_file($_FILES['gambarbuku'] ['tmp_name'],$newfile)) {
            if($uploadOk == 1) {
                unlink($file_path.$imagelawas);     
                if(oci_execute($statement)) {
                    $_SESSION['message'] = '<div class="alert alert-success" role="alert">Edit Data Sukses '.$upload.$username.$password.'</div>';
                    header('location:home_admin.php');
                }  
            }else{
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Edit Data Gagal / File Bukan Image</div>';
                header('location:home_admin.php');
            }
        }else{
            if(oci_execute($statement2)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Edit Data Sukses 2</div>';
                header('location:home_admin.php');
            }else{
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Edit Data Gagal </div>';
                header('location:home_admin.php?id='.$id);
            }
        }
    }
?>