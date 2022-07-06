<?php

    include("connection.php");

    if (!$_SESSION['login']) {
        header("location: index.php");
    }
        $statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE ID =".$_GET['id'] );
        oci_execute($statement);
        while($row = oci_fetch_array($statement)) {
            $id = $row['ID'];
            $nama = $row['NAMA'];
            $username = $row['DESKRIPSI'];
            $tanggal = $row['CREATED_AT'];
            $update = $row['UPDATE_AT'];
            $image = $row['IMAGE'];
            $kategori = $row['KATEGORI'];
            
            
            
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="detail_buku.css">
    <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
    <title>Detail</title>
</head>
<body>
    <div class="row">
        <div class="col-12 col-md-12">
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
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
              <div class="col-12 col-md-4">
                <img src="./img/<?php echo $image?>"  class="img-fluid rounded-start"  alt="..." style="width: 100%; border-radius: 20px; margin-top: 40px;" >
              </div>
              <div class="col-12, col-md-8">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $nama ?></h3>
                  <p class="date"><?php echo $tanggal?></p>
                    <p class="detaile"><?php echo $username?>
                    </p>
                    <i class="fas fa-star">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </i> <br>
                  <p class="card-text"><small class="text-muted"><?php echo $update?></small></p>
                  <div class="row " >
                    <button type ="button" class="btn btn-primary" style="margin-right: 5px;">Read Now</button>
                    <button type="button" class="btn btn-primary" style="margin-right: 5px;">Download</button>
                    <form action="bookmark_proses.php" method="POST"> 
                      <input type="hidden" name= "id_buku" value="<?php echo $id ?>">
                      <input type="hidden" name= "id_user" value="<?php echo $_SESSION['ID'] ?>">
                      <input type="submit" name= "bookmark" class="btn btn-success" value ="add to bookmark" >
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <label for="Comment class="form-label>Comments</label>
<input type="comment" id="inputcoment" class="form-control" aria-describedby="textHelpBlock" style="height: 100px;">
<div id="textHelpBlock" class="form-text">
  Give your opinions about this book
</div>
<button type="button" class="btn btn-primary">Sent</button>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-12 col-md-12">
            <section>
                <div class="container mt-3">
                    <div class="card1 shadow-lg p-3 mb-5 bg-body rounded" style="border: 100px; border-radius: 20px;">
                         <div class="card-header">
                            <b>Comment</b>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-1 col-md-1 ">
                                 <img src="data:image/png;base64,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"
                                 alt="..." class="rounded-circle shadow ">
                            </div>
                            <div class="col-sm-10 col-md-10 ms-2 ">
                              <p>
                                <b>Alexandre</b>
                            </p>
                            <i class="fas fa-star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </i> <br>
                               Terima kasih, saya merasa terbantu dengan adanya buku ini
                                
                            </div>
                            <p class="text-muted text-end  mt-3">2 hours ago, 27 oct 2021</p>
                          </div>
                          <hr>
        
                           <div class="row">
                            <div class="col-12 col-sm-1 col-md-1">
                                 <img src="data:image/png;base64,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"
                                 alt="..." class="rounded-circle shadow ">
                            </div>
                            <div class="col-12 col-sm-10 col-md-10 ms-2">
                              <p>
                                <b>tanto</b>
                            </p>
                            <i class="fas fa-star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </i> <br> <br>
                                mudah dipahami, terima kasih<i class="bi bi-emoji-heart-eyes text-danger"></i>
                                
                            </div>
                            <p class="text-muted text-end mt-3">3 hours ago, 27 oct 2021</p>
                          </div>
                          <hr>
                           <div class="row">
                            <div class="col-sm-1 col-md-1 ">
                                 <img src="data:image/png;base64,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"
                                 alt="..." class="rounded-circle shadow ">
                            </div>
                            <div class="col-sm-10 col-md-10 ms-2">
                              <p>
                                <b>galih aji</b>
                            </p>
                            <i class="fas fa-star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </i>  <br>
                                wow, menarik sekali buku ini             
                            </div>
                             <p class="text-muted text-end mt-3">13 hours ago, 27 oct 2021</p>
                          </div>
                          <hr>
                           <div class="row">
                            <div class="col-sm-1 col-md-1 ">
                                 <img src="data:image/png;base64,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"
                                 alt="..." class="rounded-circle shadow ">
                            </div>
                            <div class="col-sm-10 col-md-10 ms-2">
                              <p>
                                <b>fanny</b>
                            </p>
                            <i class="fas fa-star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </i> <br>
                               terima kasih, saya jadi paham tentang html
                            </div>
                            <p class="text-muted text-end mt-3">yesterday, 27 oct 2021</p>
                          </div>
                          <hr>
                           <div class="row">
                            <div class="col-sm-1 col-md-1">
                                 <img src="data:image/png;base64,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"
                                 alt="Gambar tidak tersedia" class="rounded-circle shadow ">
                            </div>
                            <div class="col-12 col-sm-10 col-md-10 ms-2">
                              <p>
                                <b>Syifaul</b>
                            </p>
                            <i class="fas fa-star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </i> <br>
                                Awww, suka bangett<i class="bi bi-heart-fill text-danger"></i>
                            </div>
                             <p class="text-muted text-end mt-3">2 days ago,27 oct 2021</p>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-12 text-center">
                              <a href="#" class="btn-Download text-center"><i class="fas fa-caret-down text-center"></i></a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
             </section>
            

             <div class="container" id="listBook">
              <h1 style="text-align: center; font-family:-apple-system; font-size: 25px; font-style: normal; font-family: sans-serif; margin-bottom: 20px;"><b>Top Books</b></h1>
             </div>
        </div>
    </div>
    

             <div class="container text-center mt-5 margin-right margin-top">
              <div class="row">
              <div class="col-12 col-md-3 text-center">
                <div class="card2 text-center"  style="width: 18rem; border: 20px; margin: auto;">
                  <img src="./img/gambar4.jpg"  class="card-img-top" alt="gambar tidak ditemukan">
                  <div class="card-body text-center">
                    <h5 style="text-align: center;" >111 Belajar HTML Untuk Kilat</h5>
                    <div class="star text-center">
                      <i  class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                     </div> 
                    <p class="date text-center">Tanggal rilis: 09 April 2019.</p>
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
                      <a class="btn btn-primary" href="detail.html" role="button">Preview</a>
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
                    <a class="btn btn-primary mt-4" href="detail.html" role="button">Preview</a>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            </div>
          


    <footer >
        <div class="col-12 col-md-12 mt-5 " style="background: #39BDB2;">
          <div class="container">
              <div class="row">
                  <div class="col-md-3 mt-5">
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