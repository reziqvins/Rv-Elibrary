<?php

include('connection.php');

if(isset($_POST['bookmark'])){
    $id_buku = $_POST['id_buku'];
    $id_user = $_POST['id_user'];

    $statement = oci_parse($connection, "INSERT INTO TB_BOOKMARK(TB_BUKU_ID, TB_DAFTAR_ID) VALUES ('$id_buku','$id_user')");

    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Data</div>';
        header("location:bookmark_buku.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">proses gagal</div>';
        header("location:detail_buku.php");
    }

}


?>