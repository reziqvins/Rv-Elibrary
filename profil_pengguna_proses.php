<?php
    include('connection.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id_admin'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
        $updated_at = date('Y-m-d H:i:s');
        include('file.php');

        $statementdata = oci_parse($connection,"SELECT * FROM TB_ADMIN WHERE ID = '$id'");
        oci_execute($statementdata);
        $row = oci_fetch_array($statementdata);
        $imagelawas = $row['IMAGE'];
        

        $statement = oci_parse($connection,"UPDATE TB_DAFTAR SET NAMA='$nama', USERNAME='$username',EMAIL='$email',NO_HP='$no_hp',PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), IMAGE='$upload' WHERE ID='$id'");
        $statement2 = oci_parse($connection,"UPDATE TB_DAFTAR SET NAMA='$nama', USERNAME='$username',EMAIL='$email',NO_HP='$no_hp',PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID='$id'");

        if(move_uploaded_file($_FILES['gambarbuku'] ['tmp_name'],$newfile)) {
            if($uploadOk == 1) {
                unlink($file_path.$imagelawas);     
                if(oci_execute($statement)) {
                    $_SESSION['message'] = '<div class="alert alert-success" role="alert">Edit Data Sukses '.$upload.$username.$password.'</div>';
                    header('location:profil_pengguna.php');
                }  
            }else{
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Edit Data Gagal / File Bukan Image</div>';
                header('location:profil_pengguna.php');
            }
        }else{
            if(oci_execute($statement2)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Edit Data Sukses 2</div>';
                header('location:profil_pengguna.php');
            }else{
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Edit Data Gagal</div>';
                header('location:profil_pengguna.php');
            }
        }
    }
?>