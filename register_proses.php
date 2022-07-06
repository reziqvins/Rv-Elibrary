
<?php
include('connection.php');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO TB_DAFTAR(NAMA,USERNAME,EMAIL,NO_HP,PASSWORD,CREATED_AT,DEL_FLAGE)
     VALUES ('$nama','$username','$email','$no_hp','$password',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    if (oci_execute($statement)) {
    $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Data</div>';
    header("location:index.php");
    } else{
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
    header("location:register.php");
    }
}
?>