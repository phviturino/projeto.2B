<?php
    require_once __DIR__ . '/includes/conexao.php';

    //armazenar os produtos
    $produto = array();
    $titulo_pagina = "Todos os nossos produto";

    //conexão com o banco
    if($conn) {

    if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {

    $_catfiltrada = (int)$_GET['categoria'];

    $sql = "SELECT * FROM produto WHERE id_categoria = $_catfiltrada";
    $titulo_pagina = 'Produtos da Categoria: ' . $_catfiltrada;
    }else{
        $sql = "SELECT * FROM produto";
    }
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $produto[] = $linha; 
            }
        }
    }
    ?>

<?php include __DIR__ . '/includes/header.php';?>

<main class="container mt-5 mb-5">
    
    <h2 class="text-center mb-5 text-dark catalogo-titulo">
        <?php echo $titulo_pagina; ?>
    </h2>
    
    <div class="row row-cols-1 row-cols-md-4 g-4">
        
        <?php 
        
        if (empty($produto)): 
        ?>
            <div class="col-12 text-center my-5">
                <p class="text-muted">Nenhum produto cadastrado encontrado.</p>
            </div>

        <?php 
        
        else: 
            foreach ($produto as $linha_produto): 
        ?>
                <div class="col">
                    <div class="card h-100 shadow border-0 bg-dark text-white">

                        <div class="p-3 bg-white d-flex align-items-center justify-content-center container-foto-produto">
                            <img src="img/<?php echo $linha_produto['imagem']; ?>" class="img-fluid foto-produto" alt="<?php echo $linha_produto['nome']; ?>">
                        </div>

                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title fs-6 text-uppercase mb-2 nome-produto">
                                <?php echo $linha_produto['nome']; ?>
                            </h5>

                            <p class="card-text text-secondary small mb-3">
                                Categoria #<?php echo $linha_produto['id_categoria']; ?>
                            </p>

                            <p class="card-text font-weight-bold fs-5 mt-auto mb-2 preco-produto">
                                R$ <?php echo number_format($linha_produto['preco'], 2, ',', '.'); ?>
                            </p>

                            <a href="produto-detalhes.php?id=<?php echo $linha_produto['id']; ?>" class="btn btn-outline-light btn-sm w-100">Ver Produtos</a>
                        </div>
                    </div>
                </div>
        <?php 
        
            endforeach; 
        endif; 
        ?>
        
    </div>
</main>

<?php include_once __DIR__ . '/includes/footer.php';?>