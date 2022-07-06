<?php
    include("connection.php");

    if (!$_SESSION['login']) {
        header("location: index.php");
    }

        $statement = oci_parse($connection, "SELECT * FROM TB_DAFTAR WHERE ID =".$_GET['id']);
        oci_execute($statement);
        while($row = oci_fetch_array($statement)) {
            $id = $row['ID'];
            $nama = $row['NAMA'];
            $username = $row['USERNAME'];
            $email = $row['EMAIL'];
            $no_hp = $row['NO_HP'];
            $password = $row['PASSWORD'];      
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
</head>
<body>
    
    <div class="container">
        <div class="pt-5">
            <h3 class="text-center"><b>Profil User <?php echo $nama; ?> </b></h3>
            <hr>
        </div>
        <div class="card-mt-5">
        <table class="table table-bordered table-success table-striped" style:"bordder-radius=50px;">
            <thead>
                <tr class="text-center mt-4">
                   
                    <td><b>Nama</b></td>
                    <td><b>Username</b></td>
                    <td><b>E-Mail</b></td>
                    <td><b>No HP</b></td>
                    <td><b>Password</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $no_hp; ?></td>
                    <td><?php echo $password; ?></td>
                </tr>
            </tbody>
        </table> 
        <a class="btn btn-success " href="daftar_user.php" role="button" style="margin-auto;">Kembali</a>   
        </div>
    </div>
    
    </div>

<?php include('js.php'); ?>    
</body>
</html>