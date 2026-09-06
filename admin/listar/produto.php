<?php 
include_once __DIR__ . '/../../includes/conexao.php'; 
include __DIR__ . '/../includes/header.php';

$sql = "SELECT produto.*, categoria.nome AS categoria_nome
        FROM produto
        JOIN categoria ON produto.id_categoria = categoria.id";
$resultado = mysqli_query($conexao, $sql);
?>

<main class="container mt-5 mb-5">
    <h2 class="mb-4">Produtos</h2>
    <a href="../cadastrar/produto.php" class="btn btn-success">Cadastrar Produto</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td class="descricao-limitada"><?php echo substr ($linha['descricao'], 0, 70) . '...'; ?></td>
                <td>R$ <?php echo number_format($linha['preço'], 2, ',', '.'); ?></td>
                <td><?php echo $linha['categoria_nome']; ?></td>
                <td>
                    <a href="../editar/produto.php?id=<?php echo $linha['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="../excluir/produto.php?id=<?php echo $linha['id']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>