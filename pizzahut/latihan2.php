<?php
$data = file_get_contents("data/pizza.json");
$menu = json_decode($data, true)["menu"];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pizza Hut</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="img/logoo.png" width="80">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#" data-kategori="All">All Menu</a>
      <a class="nav-item nav-link" href="#" data-kategori="Pizza">Pizza</a>
      <a class="nav-item nav-link" href="#" data-kategori="Pasta">Pasta</a>
      <a class="nav-item nav-link" href="#" data-kategori="Nasi">Nasi</a>
    </div>
  </div>
</nav>

<!-- Container -->
<div class="container">
  <div class="row mt-3">
    <div class="col">
      <h1>All Menu</h1>
    </div>
  </div>
  <div class="row" id="daftar-menu">
    <?php foreach ($menu as $m): ?>
      <div class="col-md-4 mb-4 menu-item" data-kategori="<?= $m['kategori']; ?>">
        <div class="card">
          <img src="img/pizza/<?= $m['gambar']; ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?= $m['nama']; ?></h5>
            <p class="card-text"><?= $m['deskripsi']; ?></p>
            <h5>Rp. <?= $m['harga']; ?></h5>
            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>