<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container mt-5 mb-5">

    <h2 class="text-center mb-5 text-dark catalogo-titulo">
        Todos os nossos produtos
    </h2>

    <div class="d-flex flex-warp justify-content-center gap-2 mb-3" id="categorias-nav-links">
        <!-- categorias -->
    </div>

    <p id="total-categoria" class="fw-bold"></p> 
    <button id="btn-ordenar" class="btn btn-outline-dark mb-3">Ordenar de Z-a</button>
     
    <div class="row row-cols-2 row-cols-md-4 g-4" id="lista-produtos">
        <!-- cards -->
    </div>

</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

<script src="../dashboard/dist/main.js"></script>