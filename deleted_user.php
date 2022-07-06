<?php

    include('connection.php');

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $deleted_at = date('Y-m-d H:i:s');
        $del_flage = 1;
        $statement = oci_parse($connection, "UPDATE TB_DAFTAR SET DELETED_AT = TO_DATE('$deleted_at',
        'yyyy-mm-dd hh24:mi:ss'), DEL_FLAGE='$del_flage' WHERE ID='$id'");
         if (oci_execute($statement)){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Menghapus Data</div>' ;
            header("location:daftar_user.php");
        }
        else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Menghapus Data</div>' ;
            header("location:daftar_user.php");
        }
    }
?>
