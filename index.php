<?php include 'includes/header.php';?>
    <main>
        <div class="container-fluid p-0">
          <div class="row g-0">
            <div class="col-12">
              <img src="img/banner.png" alt="banner" class="img-fluid w-100 h-75">
              <div class="container mt-5">
            <h1>Bem-vindo à Saúde Animal Agro e Vet</h1>
            <p>Encontre os melhores produtos para o cuidado dos seus animais de estimação e para a agricultura.</p>
        </div>
        </div>
        </div>
        </div>

        <?php
        $produtos = [
        ["nome" => "Bota coutry feminina", "categoria" => "EPIs", "img" => "1.jpeg"],
        ["nome" => "Ração Special Dog Bionatural", "categoria" => "PET", "img" => "4.jpeg"],
        ["nome" => "Camisa proteção UV", "categoria" => "Aventura e lazer", "img" => "2.jpeg"],
        ["nome" => "Doogs Pascoa Pet", "categoria" => "PET", "img" => "6.jpeg"],
        ];
        ?>
        <div class="container mt-5">
          <h2>Mais vendidos</h2>
          <div class="row">
        <?php foreach ($produtos as $produto): ?>
          <div class="col-md-3 mb-4">
            <div class="card">
              <img src="img/<?=$produto["img"] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
              <div class="card-body">
                <p class="text-muted small"><?= $produto['categoria'] ?></p>
                <h5 class="card-title"><?= $produto['nome'] ?></h5>
                <a href="#" class="btn btn-dark btn-sm">Ver produtos</a>
              </div>
        </div>
        </div>
          <?php endforeach; ?>
          </div>
            </div>
          </div>      
      </main>
      <?php include 'includes/footer.php';?>