<?php
    require_once __DIR__ . '/../../includes/conexao.php';

    header('Content-Type: application/json; charset=utf-8');

    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query($conexao, $sql);
    $produto = array();

    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }

    echo json_encode($produto)

?>