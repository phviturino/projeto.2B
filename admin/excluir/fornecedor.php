<?php
require_once __DIR__ . '/../../includes/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM fornecedor WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Erro no DELETE: " . mysqli_error($conexao));
}
header("location: ../listar/fornecedor.php");
exit;
?>