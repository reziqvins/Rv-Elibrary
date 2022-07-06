<?php

    include("connection.php");

    if (!$_SESSION['login']) {
        header("location: index.php");
    }
    //     $statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE ID =".$_GET['id'] );
    //     oci_execute($statement);
    //     while($row = oci_fetch_array($statement)) {
    //         $id = $row['ID'];
    //         $nama = $row['NAMA'];
    //         $username = $row['DESKRIPSI'];
    //         $image = $row['IMAGE'];
    //         $kategori = $row['KATEGORI'];
            
            
            
    // }   

    $statement = oci_parse($connection, "SELECT * FROM TB_BOOKMARK
    INNER JOIN TB_BUKU ON TB_BUKU.ID = TB_BOOKMARK.TB_BUKU_ID WHERE TB_DAFTAR_ID=".$_SESSION['ID']);
    oci_execute($statement);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
    <title>Bookmark</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #39BDB2;">
                <a class="navbar-brand" href="home.php">Rv E-Library</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
                                <?php echo $_SESSION['username']?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="profil_pengguna.php" class="dropdown-item me-10"><i class="bi bi-person-circle mr-2 fa-fw me-10" ></i>Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item" onclick="return confirm('apakah yakin?');"><i class="bi bi-box-arrow-right mr-2 fa-fw"></i>Logout</a>
                            </div>
                    </li>
                    <li class="nav-item active" style="margin-right: 50px;">
                      <a class="nav-link"  href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item" style="margin-right: 50px;">
                      <a class="nav-link" href="Bookmark_buku.php">Bookmark</a>
                    </li>

                  </ul>
                  </form>
                </div>
              </nav>
        </div>
    </div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav style="--bs-breadcrumb-divider: '>'; background-color: #39BDB2;" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Bookmark</li>
        </ol>
      </nav>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <form class="d-flex" >
            <input
              class="form-control me-2 mt-4 shadow"type="search" placeholder="Type Books..." aria-label="Search" style="height: 50px; color: rgb(0, 0, 0);"/>
            <button class="btn1 bg-dark mt-4 shadow" type="submit" style="color: white;">
              Search
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5 mb-5">
  <div class="row">
    <?php while($row = oci_fetch_array($statement)): ?>
      <div class="col-md-3">
        <div class="card2" style="width: 18rem; border: 20px; margin: auto;">
          <img src="./img/<?php echo $row['IMAGE'] ?>"  class="card-img-top" alt="gambar tidak ditemukan">
          <div class="card-body">
          <h5 style="text-align: center;" ><?php echo $row['NAMA']?></h5>
          <div class="star text-center">
            <i  class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <p class="date text-center"><?php echo $row['CREATED_AT']?></p>
          <p class="detaile"><?php echo $row['DESKRIPSI']?></p>
            <a class="btn btn-primary" href="detail_buku.php?id=<?php echo $row['ID'];?>" role="button">Preview</a>
           </div> 
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
    <!-- <div class="container  mt-5 margin-right mb-5">
    <div class="row">
    <div class="col-12 col-md-3 mb-3">
      <div class="card2 "  style="width: 18rem; border: 20px; margin: auto;">
        <img src="./img/gambar4.jpg"  class="card-img-top" alt="gambar tidak ditemukan">
        <div class="card-body">
          <h5 style="text-align: center;" >111 Belajar HTML Untuk Kilat</h5>
          <div class="star text-center">
            <i  class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
           </div> 
          <p class="date text-center">Tanggal rilis: 09 April 2019.</p>
          <p class="detaile">Teknik menguasai HTML secepat kilat Untuk pemula yang ingin menjadi master HTML Untuk menguasai pemrograman web ...</p>
            <a class="btn btn-primary" href="detail.html" role="button">Preview</a>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-3">
      <div class="card2 margin-top " style="width: 18rem;">
        <img src="./img/gambar8.jpg"  style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
        <div class="card-body " >
          <h5 style="text-align: center;">Do: Bakteri yang Selalu Bertanya</h5>
          <div class="star text-center">
            <i  class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i style="color: black;" class="far fa-star"></i>
           </div> 
          <p class="date text-center">Tanggal rilis: 09 September 2021.</p>
           <p class="detaile">Apakah yang akan terjadi jika seekor bakteri sederhana
            
            yang seharusnya hanya menunaikan tugas tanpa
            
            mempertanyakan apa ...
            
            </p>
            <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
        </div>
      </div>
    </div>

  <div class="col-12 col-md-3">
    <div class="card2" style="width: 18rem;">
      <img src="./img/gambar11.jpg" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;">White Coat Syndrome</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>
         </div> 
        <p class="date text-center">Tanggal rilis: 25 October 2021.</p>
          <p class="detaile">Namaku Claudy Lee. Sebelum bertemu dengan Sungjin, duniaku gelap gulita. Aku adalah seorang penulis yang penuh luka—yang berhasil menyelundupkan ...</p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/gambar5.jpg" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;">Investing in Digital Start Up</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>
         </div> 
        <p class="date text-center">Tanggal rilis: 27 October 2021.</p>
          <p  class="detaile">Buku ini menjawab pertanyaan:
          <br>
          1. Bagaimana cara kerja dunia 4.0 sesungguhnya? ...
          <br>
          </p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
    </div>
    </div> -->
    


    <footer >
        <div class="col-12 col-md-12 mt-5 " style="background: #39BDB2;">
          <div class="container">
              <div class="row">
                  <div class="col-12 col-md-3 mt-5">
                      <h5>Rv E-Library</h5>
                      <i class="fab fa-facebook"></i>
                      <i class="fab fa-instagram"></i>
                      <i class="fab fa-twitter"></i>
                      <p>2021 copyright reserved &copy;</p>
                  </div>
                  <div class="col-12 col-md-3 mt-5">
                      <h5>About</h5>
                      <p>Blog</p>
                      <p>Publish With Us</p>
                  </div>
                  <div class="col-12 col-md-3 mt-5">
                     <h5>Help</h5>
                     <p>Contact Us</p>
                     <p>Helps</p>
                     <p>Term and Conditions</p>
                     <p>Privacy Policy</p>
                 </div>
                 <div class="col-12 col-md-3 mt-5">
                     <h5>Network</h5>
                     <p>E-Library</p>
                 </div>
              </div>
          </div>
      </div>
      </div>
      </footer>
      <?php include('js.php'); ?>    
</body>
</html>