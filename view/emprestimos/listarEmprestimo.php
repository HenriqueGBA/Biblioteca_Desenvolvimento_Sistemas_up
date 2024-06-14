<?php
require_once '../../model/conexao.php';
require_once '../../model/Emprestimo.php';

$emprestimo = new Emprestimo($pdo);
$emprestimos = $emprestimo->listar();

$pageTitle = "Listar Empréstimos";
require_once '../includes/header.php';

// Exibir mensagem de feedback
if (isset($_GET['mensagem'])) {
    echo "<p>" . htmlspecialchars($_GET['mensagem']) . "</p>";
}
?>

<h2>Lista de Empréstimos</h2>

<a href="adicionar.php">Adicionar Empréstimo</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Livro</th>
        <th>Data de Empréstimo</th>
        <th>Data de Devolução Prevista</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($emprestimos as $emprestimo): ?>
        <tr>
            <td><?= htmlspecialchars($emprestimo['id']) ?></td>
            <td><?= htmlspecialchars($emprestimo['usuario']) ?></td>
            <td><?= htmlspecialchars($emprestimo['livro']) ?></td>
            <td><?= htmlspecialchars($emprestimo['data_emprestimo']) ?></td>
            <td><?= htmlspecialchars($emprestimo['data_devolucao_prevista']) ?></td>
            <td>
                <a href="editar.php?id=<?= htmlspecialchars($emprestimo['id']) ?>">Editar</a>
                <a href="excluir.php?id=<?= htmlspecialchars($emprestimo['id']) ?>"
                   onclick="return confirm('Tem certeza que deseja excluir este empréstimo?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once '../includes/footer.php';
?>
