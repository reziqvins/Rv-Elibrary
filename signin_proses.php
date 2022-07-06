<?php
include('connection.php');
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data admin dengan username dan password yang sesuai
    $statement = oci_parse($connection,"SELECT * FROM TB_DAFTAR WHERE USERNAME='$username' and PASSWORD='$password'");
    oci_execute($statement);
    $row = oci_fetch_array($statement);
    $cek = oci_num_rows($statement);
    if($cek > 0){
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;
            header("location:home.php");
    }else{
        header("location:index.php?pesan=gagal");
    }
} else{
    die("Akses dilarang...");
}

?>