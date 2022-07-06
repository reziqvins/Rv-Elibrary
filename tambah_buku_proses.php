<?php
include('connection.php');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    include('file.php');


    $statement = oci_parse($connection, "INSERT INTO TB_BUKU(NAMA,DESKRIPSI,IMAGE,KATEGORI,CREATED_AT,DEL_FLAGE)
     VALUES ('$nama','$deskripsi','$upload','$kategori',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    
    if(!file_exists($newfile)){
        if($uploadOk == 1){
            move_uploaded_file($_FILES['gambarbuku']['tmp_name'],$newfile);
            if (oci_execute($statement)) {
                $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Data</div>';
                header("location:home_admin.php");
                } 
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Upload gagal</div>';
            header("location:tambah_buku.php");
        }
    }else{
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
        header("location:tambah_buku.php");
    }
    
}
?>