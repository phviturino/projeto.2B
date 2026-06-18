<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saúde Animal Agro e Vet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <?php 
  $pagina_atual = basename($_SERVER['PHP_SELF']);
  ?>
<header>
    <nav class="navbar-dark">
  <div class="container-fluid"> 

    <div class="row align-items-center"> 

    <div class="col-md-3 col-sm-4">
    <a class="logo" href="index.php">
      <img src="img/lojaicone.jpeg" alt="icone" class="logo-img">
    </a>
</div>

<div class="col-md-6 col-sm-8">
    <form class="d-flex busca" role="buscar">
      <input class="form-control me-2 w-100" type="search" placeholder="Buscar" aria-label="Buscar"/>
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
    </div>

    <div class="col-md-3 d-none d-md-block">
      <div class="d-inline-flex align-items-center info-contato">
        <div class="contato me-2">
            <a href="contato.php" class="btn-contato">
          <i class="bi bi-whatsapp"></i>
          Fale conosco
          </a>
        </div>
  </div>
  </div>
  </div>
</div>
</nav>

<div class="menu-nav text-center mb-3">
  <div class="mb-3">
    <a href="produtos.php" class="btn btn-warning btn-lg fw-bold px-5 py-3 text-dark text-uppercase rounded-pill shadow-lg  btn-banner-home">
      🛒 VEJA NOSSO CATÁLOGO 
    </a>
  </div>

  <hr class="w-50 mx-auto my-3 text-secondary">
</div> <?php if ($pagina_atual !== 'index.php'): ?>

<div class="menu-nav text-center mb-5"> 

<?php
    $cat_atual = isset($_GET['categoria']) ? (int)$_GET['categoria'] : 0;
?>

  <ul class="nav justify-content-center d-flex list-unstyled mb-0 ">
    
    <li><a class="nav-link <?= ($cat_atual == 8) ? 'active' : '' ?>" href="produtos.php?categoria=8">Pecuária</a></li>
    <li><a class="nav-link <?= ($cat_atual == 9) ? 'active' : '' ?>" href="produtos.php?   categoria=9">Pet</a></li>
    <li><a class="nav-link <?= ($cat_atual == 10) ? 'active' : '' ?>" href="produtos.php?categoria=10">Medicamentos</a></li>
    <li><a class="nav-link <?= ($cat_atual == 11) ? 'active' : '' ?>" href="produtos.php?categoria=11">EPIs</a></li>
    <li><a class="nav-link <?= ($cat_atual == 12) ? 'active' : '' ?>" href="produtos.php?categoria=12">Jardinagem</a></li>
    <li><a class="nav-link <?= ($cat_atual == 13) ? 'active' : '' ?>" href="produtos.php?categoria=13">Aventura e Lazer</a></li>
    <li><a class="nav-link <?= ($cat_atual == 14) ? 'active' : '' ?>" href="produtos.php?categoria=14">equipamentos</a></li>
    <li><a class="nav-link <?= ($cat_atual == 15) ? 'active' : '' ?>" href="produtos.php?categoria=15">Vestuário</a></li>
    <li><a class="nav-link <?= ($cat_atual == 16) ? 'active' : '' ?>" href="produtos.php?categoria=16">Outros</a></li>
  </ul>
</div>

<?php endif;?>

</header>