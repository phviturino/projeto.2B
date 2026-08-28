<?php
require_once __DIR__ . '/../../includes/conexao.php';

$sql = "SELECT * FROM categoria";
$resultado = mysqli_query($conexao, $sql);
?>

<main class="container mt-5 mb-5">
    <h2 class="mb-4">Categorias</h2>

    <a href="../cadastrar/categoria.php" class="btn btn-success mb-3">Nova Categoria</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $linha['id']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['descrição']; ?></td>
                    <td>
                        <a href="../editar/categoria.php?id=<?php echo $linha['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../excluir/categoria.php?id=<?php echo $linha['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>
</main>