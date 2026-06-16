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
        ["nome" => "Ração Special Dog Bionatural", "categoria" => "PET", "img" => "3.jpeg"],
        ["nome" => "Camisa proteção UV", "categoria" => "Aventura e lazer", "img" => "2.jpeg"],
        ["nome" => "Doogs Pascoa Pet", "categoria" => "PET", "img" => "4.jpeg"],
        ["nome" => "Biscoito Ultralife Special Dog", "categoria" => "PET", "img" => "5.jpeg"],
        ["nome" => "Caminha Perros", "categoria" => "PET", "img" => "6.jpeg"],
        ["nome" => "Deo Colônia Perfume Perro", "categoria" => "PET", "img" => "7.jpeg"],
        ["nome" => "Benefit Petiscos", "categoria" => "Equinos", "img" => "8.jpeg"]
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
                  <a href="produtos.php" class="btn btn-dark btn-sm">Ver produtos</a>
              </div>
        </div>
        </div>
        
          <?php endforeach; ?>
          <div class="container text-center my-5">
            <a href="produtos.php" class="btn btn-outline-dark">Ver mais produtos</a>
            </div>
            <div class="container my-5">
              <div class="row align-itens-center">

                <div class="col-md-6">
                  <h2>Conheça nossa história</h2>

                  <p>Fundada em 2020, a Saúde Animal Agro e Vet nasceu do sonho de oferecer produtos de qualidade para o cuidado dos animais e para a agricultura. Com uma equipe apaixonada por animais e comprometida com a excelência, buscamos proporcionar a melhor experiência de compra para nossos clientes.</p>
                  <p>Desde o início, nosso foco tem sido a satisfação do cliente, oferecendo uma ampla variedade de produtos que atendem às necessidades de cada animal e agricultor. Com quatro lojas físicas estrategicamente localizadas, estamos sempre prontos para atender nossos clientes com dedicação e profissionalismo.</p>

      <div class="row mt-5 text-center">

        <div class="col-md-4">
        <h2 class="text-warning fw-bold">7+</h2>
        <p class="text-uppercase">Anos</p>
        </div>

        <div class="col-md-4">
        <h2 class="text-warning fw-bold">4</h2>
        <p class="text-uppercase">LOJAS</p>
        </div>

        <div class="col-md-4">
        <h2 class="text-warning fw-bold">1000+</h2>
        <p class="text-uppercase">Produtos</p>
        </div>

        </div>

                  </div>
                  <div class="col-md-6 ">
                    <img class="img-fluid foto" src="img/colaboradores.jpeg" alt="Colaboradores">
                </div>

                

                </div>
          
          </div>
          </div>
            </div>
          </div>      
      </main>
      <?php include 'includes/footer.php';?>