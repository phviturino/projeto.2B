<?php
$base = (basename($_SERVER['PHP_SELF']) == 'index.php') ? '' : '../';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saúde Animal Agro e Vet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $base ?>css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <?php 
  $pagina_atual = basename($_SERVER['PHP_SELF']);
  ?>
<header>
    <nav class="navbar-dark py-3">
      <div class="container-fluid px-3"> 

      <div class="d-flex justify-content-center mb-3 d-md-none">
        <a class="logo" href="../index.php">
        <img src="<?= $base ?>img/lojaicone.jpeg" alt="icone" class="logo-img-mobile">
        </a>
      </div>

<div class="row align-items-center d-none d-md-flex">

    <div class="col-md-3">
      <a class="logo" href="../index.php">
      <img src="<?= $base ?>img/lojaicone.jpeg" alt="icone" class="logo-img">
      </a>
    </div>

    <div class="col-md-6">
      <form action="<?= $base ?>pages/produtos.php" method="GET" class="d-flex busca" role="search">
      <input class="form-control me-2 w-100" type="search" name="busca" placeholder="Buscar" aria-label="Buscar" value="<?= isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : '' ?>"/>
      <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <div class="col-md-3 d-md-block">
        <div class="d-flex align-items-center justify-content-end info-contato">
        <a href="<?= $base ?>pages/contato.php" class="btn-contato">
        <i class="bi bi-whatsapp"></i>
        Fale conosco
        </a>
    </div>
        </div>
    </div>

    <div class="d-md-none d-flex align-items-center">
    <form action="<?= $base ?>pages/produtos.php" method="GET" class="d-flex flex-grow-1" role="search">
    <input class="form-control me-2" type="search" name="busca" placeholder="Buscar Produto" aria-label="Buscar" value="<?= isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : '' ?>"/>
    <button class="btn btn-outline-success px-3" type="submit">
      <i class="bi bi-search"></i>
    </button>
    
    </form>
    <a href="<?= $base ?>pages/contato.php" class="btn-contato-mobile ms-2">
    <i class="bi bi-whatsapp"></i>
      </a>
    </div>

  </div>
</nav>

<?php if ($pagina_atual === 'index.php'): ?>
<div class="menu-nav text-center mb-3">
  <div class="mb-3">
    <a href="<?= $base ?>pages/produtos.php" class="btn btn-warning btn-lg fw-bold px-5 py-3 text-dark text-uppercase rounded-pill shadow-lg  btn-banner-home">
      🛒 VEJA NOSSO CATÁLOGO 
    </a>
  </div>
  
  <hr class="w-50 mx-auto my-3 text-secondary">
</div> 
<?php endif;?>

</header>