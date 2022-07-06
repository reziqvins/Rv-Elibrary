<?php
    include('connection.php');
    if(isset($_POST['submit'])) {
        $komen = $_POST['komentar'];
        $username = $_SESSION['username'];
        $created_at = date('Y-m-d H:i:s');
        $id_buku =$_GET['id'];
        $del_flage = 0;
        $username = $_SESSION['username'];
        $id_user = $_SESSION['ID'];
        $nama_user = $_SESSION['nama'];


        $statement = oci_parse($connection,"INSERT INTO TB_KOMENTAR (KOMENTAR,CREATED_AT,DEL_FLAGE,TB_BUKU_ID,TB_DAFTAR_ID,TB_DAFTAR_USERNAME,TB_BUKU_NAMA) VALUES ('$komen',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage','$id_buku','$id_user','$username','$nama_user')");
        
        if(oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">Upload Data Sukses</div>';
                header('location:detail_buku_user.php?id='.$id_buku.'');
        }else{
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Upload Data Gagal / File Bukan Image</div>';
                header('location:detail_buku_user.php?id='.$id_buku.'');
        }
    }
?>