<?php include 'includes/header.php';?>
    <main>
      <div class="container mt-5">
            <h1>Bem-vindo à Saúde Animal Agro e Vet</h1>
            <p>Encontre os melhores produtos para o cuidado dos seus animais de estimação e para a agricultura.</p>
      </div>
        <div class="container-fluid p-0 position-relative">
          <div class="row g-0">
            <div class="col-12">
              <img src="img/banner.png" alt="banner" class="img-fluid w-100 h-75 rounded-2">
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

       <div class="container my-5">

        <div class="d-flex align-itens-center justify-content-center mb-4 border-bottom pb-3">
          <h2 class="fw-bold m-0  fs-3 text-dark text-uppercase destaque-vendas">🔥 Mais vendidos</h2>
        </div>
        <div class="row g-4">
          <?php foreach ($produtos as $produto): ?>
            <div class="col-12 col-sm-6 col-md-3">

            <div class="card h-100 border-0 shadow-sm rounded-0 overflow-hidden">

            <div class="box-foto-produto p-3 bg-white produto-destaque">
              <img src="img/<?=$produto['img'] ?>" class="img-fluid imagem-destaque" alt="<?=$produto['nome'] ?>">
            </div>

            <div class="card-body bg-dark text-white text-center d-flex flex-collum justify-content-between p-3 texto-destaque">
              <div class="info-produtos mb-3">
              <h6 class="card-title text-white fw-bold text-uppercase mb-1">
              <?=$produto['nome'] ?>
              </h6>
              <span class="text-secondary small d-block fs-12">
                <?=$produto['categoria'] ?>
          </span>
          </div>

          <a href="produtos.php" class="btn btn-success w-100 fw-bold py-2 rounded-1 text-uppercase mb-0 detalhes-destaque">Ver Produtos</a>
          </div>
          </div>
          </div>
          <?php endforeach; ?>

          </div>
          <div class="text-center my-5">
            <a href="produtos.php" class="btn btn-outiline-dark px-5 py-2 fw-bold text-uppercase">Ver mais produtos</a> 
          </div>
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
                  <div class="col-md-6">
                    <img class="img-fluid foto rounded-5" src="img/colaboradores.jpeg" alt="Colaboradores">
                </div>

                

                </div>
          
          </div>
          </div>
            </div>
          </div>      
      </main>
      <?php include 'includes/footer.php';?>