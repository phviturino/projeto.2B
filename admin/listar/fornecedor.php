<?php
require_once __DIR__ . '/../../includes/conexao.php';
include __DIR__ . '/../includes/header.php';

$sql = "SELECT * FROM fornecedor";
$resultado = mysqli_query($conexao, $sql);
?>

<main class="container mt-5 mb-5">
    <h2 class="mb-4">Fornecedores</h2>

    <a href="../cadastrar/fornecedor.php" class="btn btn-success mb-3">Novo Fornecedor</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $linha['id']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['telefone']; ?></td>
                    <td><?php echo $linha['email']; ?></td>
                    <td>
                        <a href="../editar/fornecedor.php?id=<?php echo $linha['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../excluir/fornecedor.php?id=<?php echo $linha['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>