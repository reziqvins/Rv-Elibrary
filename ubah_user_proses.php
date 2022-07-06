<?php

     include('connection.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
        $updated_at = date('Y-m-d H:i:s');

        $statement = oci_parse($connection, "UPDATE TB_DAFTAR SET  NAMA='$nama', USERNAME='$username'
        ,EMAIL='$email',NO_HP='$no_hp', PASSWORD='$password', UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID='$id' ");
        if(oci_execute($statement)){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Mengubah Data</div>' ;
            header("location:daftar_user.php?");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Mengubah Data </div>' ;
            header("location:ubah_user.php?id=$id");
        }
    }
?>