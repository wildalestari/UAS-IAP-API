<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_CURL($url)
{

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL,$url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}
$result =get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyDjiiAMFQeTUBTCRWqNWE441JWyZpDvoqM');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyA_PvI0iKr270E1f3jGpk65dfkiXWH9z8M&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResult=3&part=snippet';
$result = get_CURL($urlLatestVideo);
$latestVidioId = $result['items'][0]['id']['videoId'];

//Instagram API
$clientId = '17841406882026927';
$accessToken = 'IGAAP5ZB9ZCIgS1BZAE1XX0F2bTZAKc1V3M0l5ZAU9EelE5ck5lTTdGTlgtczZAKbE0xVVN4OTJfM1paamRlSjV4eThSUVFKOG8zTGxTWDlPUTljWDVlak13c2RxenNvN1hiTzZAlMmZAseTd6ZAmlTVkhWSWthczhtblJzMDRhWkxmZAG1kZAwZDZD';

$result = get_CURL("https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=$accessToken");
$usernameIG = $result['username'];
$profilePictureIG = $result['profile_picture_url'];
$followersIG = $result['followers_count'];

//media IG
$media = get_CURL("https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type,timestamp&access_token=$accessToken");
$gambar = "";
if (isset($media['data']) && count($media['data']) >= 1) {
    $gambar = $media['data'][0]['media_url'];
}

?>


 





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Wilda Lestari</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile5.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Wilda Lestari</h1>
          <h3 class="lead">Collage student | Programmer | Travellover</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About Me</h2>
          </div>
        </div>
      <section class="About Me bg-light" id="About Me">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img\thumbs\13.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Halo,saya wilda lestari Aku berasal dari Riau.Saya lahit pada 03 maret 2004.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/14.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Saat ini sedang menempuh pendidikan sarjana di jurusan Sistem Informasi, Universitas Islam Negeri Imam Bonjol Padang.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"> walapun tidak menyukai dunia percodingan. Tapi justru dari sinilah aku belajar banyak hal baru—bagaimana menyusun logika, berpikir sistematis, menyelesaikan masalah, dan membangun sesuatu dari nol.</p>
              </div>
            </div>
          </div>   
        </div>
         <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/15.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"> aku senang membaca novel—bukan hanya sebagai hiburan, tapi juga sebagai cara untuk memperluas wawasan, memahami beragam sudut pandang, dan menambah pengetahuan secara tidak langsung. </p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/16.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">aku juga sering menonton film sebagai bentuk hiburan dan healing dari rutinitas—membantuku rileks, rehat sejenak, dan kembali semangat menjalani hari..
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/17.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Aku percaya bahwa setiap proses belajar, sekecil apa pun, akan membentuk versi diriku yang lebih baik di masa depan. Aku bukan hanya ingin memahami teknologi, tapi juga tumbuh sebagai pribadi yang adaptif, terbuka, dan siap menghadapi berbagai tantangan.</p>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- Youtube & IG -->
        <div class="container">
          <div class="row pt-4 mb-4">
            <div class="col text-center">
              <h2> Social Media</h2>
            </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle
                img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $channelName; ?></h5>
                <p><?= $subscriber; ?> Subscribers.</p>
                <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-theme="dark" data-count="default"></div>
              </div>               
            </div>           
            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" 
                  src="https://www.youtube.com/embed/<?= $latestVidioId; ?>?rel=0" 
                  allowfullscreen></iframe>
                </div>
              </div>
            </div> 
          </div>
          
          <div class="col-md-5 mb-4">
          <div class="row" pt-4 mb-4>
            <div class="col-md-4">
              <img src="<?= $profilePictureIG; ?>" width="120" class="rounded-circle img-thumbnail">
            </div>
             <div class="col-md-8">
                <h5><?= $usernameIG; ?></h5>
                <p><?= $followersIG; ?>Followers</p>
                <img src="<?= $gambar ?>" alt="Gambar Instagram" class="img-fluid center" style="max-width: 260px; height: auto;">

              </div> 
            </div>
            <div class="row">
          <div class="col">
            <!-- <img src="<?= $gambar; ?>" class="img-fluid rounded"> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



    <!-- Portfolio -->
    <section class="portfolio bg-light" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/19.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"> PIZZA-HUT</p>
                <p class="card-text"> project sederhana menggunakan API pada wpu pizza hut </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/22.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">JSON</p>
                <p class="card-text">Implementasi dasar API dengan sumber data JSON.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">WPU-MOVIE </p>
                <p class="card-text">Implementasi sederhana menggunakan OMDBAPI manggunakan data movie</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">WPU-PORTOFOLIO</p>
                <p class="card-text">Menggunakan API wpu portofolio yang di ambil dari youtube dan instagram</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">WPU-REST-SERVER</p>
                <p class="card-text">Membuat Rest-Server menggunakan Codeeigniter</p>
               
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">WPU-REST-CLIENT</p>
                <p class="card-text">Implementasi Rest-Client menggunakan Codeeigniter</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Home</li>
              <li class="list-group-item">Pasir Pengaraian,Riau</li>
              <li class="list-group-item">West Sumatera,Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>wildalstr__2025.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>