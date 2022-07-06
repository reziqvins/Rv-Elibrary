<?php

    include("connection.php");

    if (!$_SESSION['login']) {
        header("location: index.php");
    }
    $statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE DEL_FLAGE = 0");
    oci_execute($statement);
    // while($row = oci_fetch_array($statement)){
    //     $id = $row['ID'];
    //     $nama = $row['NAMA'];
    //     $deskripsi = $row['DESKRIPSI'];
    //     $image = $row['IMAGE'];
    //     $kategori = $row['KATEGORI'];
    //     $created_at = $row['CREATED_AT'];
        


    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
    <title>Rv~Library</title>
</head>
<body>
  
    <div class="row">
        <div class="col-12 col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
                    <li class="nav-item active" style="margin-right: 20px;">
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

    <section class="landingPage" id="landingPage">
      <div class="image">
          <img src="./img/banner1.png" style="margin-top: -10; margin-right: 30px;" alt="">
      </div>
      <div class="content" style="margin-top: -40px;" >
        <h3>Selamat Datang Di <span> <br> Rv E-Library</span></h3>
        <p>Tempatnya Buku-Buku gratis untuk dibaca</p>
    </div>
    </section>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-12">
      <h3 style="text-align: center;"> Category</h3>
    </div>
  </div>
</div>

 
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-md-3">
          <div class="card"style="width: 18rem;" >
            <img src="./img/Informatic.png" style="width: 100px; " class="card-img-top" alt="gambar tidak ditemukan">
            <div class="card-body">
              <h5 style="text-align: center;">Informatic</h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="card" style="width: 18rem;">
            <img src="./img/Education.png" style="width: 100px;"class="card-img-top" alt="gambar tidak ditemukan">
            <div class="card-body">
              <h5 style="text-align: center;">Education</h5>
              <p class="card-text"></p>
            </div>
          </div>

        </div>
        <div class="col-12 col-md-3">
          <div class="card" style="width: 18rem;">
            <img src="./img/Bussines.png" style="width: 100px; "class="card-img-top" alt="gambar tidak ditemukan">
            <div class="card-body">
              <h5 style="text-align: center;">Bussines</h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="card" style="width: 18rem;">
            <img src="./img/Other.png" style="width: 100px;"class="card-img-top" alt="gambar tidak ditemukan">
            <div class="card-body">
              <h5 style="text-align: center;">Other</h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>

      </div>
    </div>
<!-- Populer Books -->
<div class="container mt-5 mb-5 ">
  <div class="row">
    <div class="col-12 col-md-12 ">
      <h3 style="text-align: center;"> Popular Books</h3>
    </div>
  </div>
</div>

<div class="container   mt-5 margin-right margin-top">
  <div class="row">
  <div class="col-12 col-md-3 ">
    <div class="card2 "  style="width: 18rem; border: 20px;">
      <img src="./img/gambar4.jpg" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;">111 Belajar HTML Untuk Kilat</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> 
        <p class="date text-center">Tanggal rilis: 09 April 2019.</p>
        <p class="detaile">Teknik menguasai HTML secepat kilat Untuk pemula yang ingin menjadi master HTML Untuk menguasai pemrograman web ...</p>
          <a  class  ="btn btn-primary " href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem; border: 20px;">
      <img src="./img/gambar14.jpg" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5>Perang Melawan Corona (COVID-19)</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> 
        <p class="date text-center">Tanggal rilis: 30 October 2020.</p>
        <p class="detaile">Buku “Perang Melawan Corona (Covid -19)” diharapkan kita dapat mengerti tentang Covid-19, proses penularan, dan cara menanggulangi</p>
          <a class="btn btn-primary" href= "detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/gambar13.jpg" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;">Pengetahuan‌ ‌Kearifan‌ ‌Lokal:‌ ‌Pangan‌ ‌dan‌ ‌Kesehatan‌</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> 
        <p class="date text-center">Tanggal rilis: 14 October 2021.</p>
        <p class="detail">Indonesia, negara kepulauan dengan jumlah pulau lebih dari 17.000, serta kelompok penduduk etnis sebanyak ...</p>
        <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
 
  <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/gambar15.jpg" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;">COVID-19 BAGAIMANA AGAR TIDAK TERTULAR</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> 
        <p class="date text-center">Tanggal rilis: 29 June 2020. </p>
        <p class="detaile">Buku ini merupakan penjelasan dari seorang dokter dengan bahasa cukup
          
          populer dan mudah dipahami. Ketika banyak negara ...</p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
</div>

<div class="container text-end">
  <div class="row justify-content-end">
    <div class="col-12 col-md-1">
      <a href="#" class="btn-Download">See all</a>
    </div>
  </div>
</div>
</div>

<!-- semua buku -->
<div class="container mt-5 mb-5 ">
  <div class="row">
    <div class="col-12 col-md-12 ">
      <h3 style="text-align: center;"> All Books</h3>
    </div>
  </div>
</div>

<div class="container  mt-5 margin-right margin-top" >
  <div class="row">
    <?php while($row = oci_fetch_array($statement)):?>
      <div class="col-12 col-md-3">
        <div class="card2 " style="width: 18rem;">
          <img src="./img/<?php echo $row['IMAGE'];?>" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
          <div class="card-body">
            <h5 style="text-align: center;"><?php echo $row['NAMA'];?></h5>
            <div class="star text-center">
              <i  class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i style="color: black;" class="far fa-star"></i>

            </div> 
            <p class="date text-center"><?php echo $row['CREATED_AT'];?>.</p>
              <p class="detaile"><?php echo $row['DESKRIPSI'];?>
              </p>
              <a class="btn btn-primary" href="detail_buku.php?id=<?php echo $row['ID'];?>" role="button">Preview</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
  <!-- <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/<?php echo $image;?>" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;"><?php echo $nama; ?></h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>

         </div> 
        <p class="date text-center">Tanggal rilis: 29 October 2021.</p>
          <p class="detaile">Kali ini terima kasih kepada sebuah kenangan yang selalu saja memberikan duka untukku. Tapi semua tak menyurutkan menemui secuil kisah hidup. Kita terlalu ...</p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
  -->
  <!-- <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/<?php echo $image;?>"  style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body " >
        <h5 style="text-align: center;"><?php echo $nama; ?></h5>
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
</div> -->
</div>
</div>

<!-- <div class="container mt-5 margin-right margin-top">
  <div class="row">
  <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/<?php echo $image;?>" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;"><?php echo $nama; ?></h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>

         </div> 
        <p class="date text-center">Tanggal rilis: 09 September 2021.</p>

          <p class="detaile">Gue memang enggak tahu identitas orangtua kandung gue.
          
          Gue juga enggak akan menutupi perasaan tertolak gue dari keluarga asli gue. Tetapi seumpama ini sebuah transaksi ... 
          </p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3">
    <div class="card2 " style="width: 18rem;">
      <img src="./img/<?php echo $image;?>" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;"><?php echo $nama; ?></h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>

         </div> 
        <p class="date text-center">Tanggal rilis: 06 October 2021. </p>
         <p class="detaile">Statistika masa kini bukan lagi perkara perhitungan manual dengan banyak rumus yang harus dihafal. Sebaliknya, statistika perlu mewadahi rasa ingin tahu dan sikap kritis untuk memahami dunia dengan data dan fakta ... </p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div>
    </div>
  </div><div class="col-12 col-md-3">
    <div class="card2" style="width: 18rem;">
      <img src="./img/<?php echo $image;?>" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
      <div class="card-body">
        <h5 style="text-align: center;">Krisis Tata Kelola Pendidikan</h5>
        <div class="star text-center">
          <i  class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i style="color: black;" class="far fa-star"></i>

         </div> 
        <p class="date text-center">Tanggal rilis: 12 October 2021.</p>
         <p class="detaile">Tata kelola pendidikan Indonesia diadang persoalan untuk mencapai tujuan mulia konstitusi. Melalui visi pembangunan Indonesia 2045, pemerintah menargetkan taraf ...</p>
        <button type="button" class="btn btn-primary">Preview</button>
      </div>
    </div>
  </div>
 
  <div class="col-12 col-md-3">
    <div class="card2" style="width: 18rem;">
      <img src="./img/<?php echo $image;?>" style="border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
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
          <p class="detaile">Namaku Claudy Lee. Sebelum bertemu dengan Sungjin, duniaku gelap gulita. Aku adalah seorang penulis yang penuh luka—yang berhasil menyelundupkan luka itu ke dalam berbagai tulisan.
          
          Sungjin menerangi jalan ...</p>
          <a class="btn btn-primary" href="detail_buku.php" role="button">Preview</a>
      </div> -->
    </div>
  </div>




<div class="container margin-top justify-content-center" >
  <div class="row">
    <div class="col-12 col-md-12 margin-top" >
      <nav aria-label="Page navigation example">
        <ul class="pagination" style="justify-content: center; margin-top: auto;">
          <li class="page-item text-center" style="justify-content: center;">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item"><a class="page-link" href="#">8</a></li>
          <li class="page-item"><a class="page-link" href="#">9</a></li>
          <li class="page-item"><a class="page-link" href="#">10</a></li>

          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>



<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-12" style="border-radius: 20px;">
      <img src="./img/Banner2.png" style="width: 100%; border-radius: 20px;" class="card-img-top" alt="gambar tidak ditemukan">
    </div>
  </div>
</div>
</div>
</div>

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

    </div>

<?php include('js.php'); ?>

  <!-- Script Start -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
  <!-- Script End -->
     
</body>
</html>