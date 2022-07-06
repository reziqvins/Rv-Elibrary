<?php
include('connection.php');
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data admin dengan username dan password yang sesuai
    $statement = oci_parse($connection,"SELECT * FROM TB_ADMIN WHERE USERNAME='$username' and PASSWORD='$password'");
    oci_execute($statement);
    oci_fetch($statement);
    $cek = oci_num_rows($statement);
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header("location:profil_admin.php");
    }else{
        header("location:signin_admin.php?pesan=gagal");
    }
} else{
    die("Akses dilarang...");
}

?>