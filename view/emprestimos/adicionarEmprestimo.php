<?php
require_once '../../model/conexao.php';
require_once '../../model/Emprestimo.php';
require_once '../../model/Livro.php';
require_once '../../model/Usuario.php';

$livro = new Livro($pdo);
$usuario = new Usuario($pdo);
$livros = $livro->listarDisponiveis();
$usuarios = $usuario->listar();

$pageTitle = "Adicionar Empréstimo";
require_once '../includes/header.php';

// Exibir mensagem de feedback
if (isset($_GET['mensagem'])) {
    echo "<p>" . htmlspecialchars($_GET['mensagem']) . "</p>";
}
?>

<h2>Adicionar Empréstimo</h2>

<form action="../../controller/emprestimoController.php" method="post">
    <label for="usuario_id">Usuário:</label>
    <select name="usuario_id" id="usuario_id" required>
        <?php foreach ($usuarios as $usuario): ?>
            <option value="<?= htmlspecialchars($usuario['id']) ?>"><?= htmlspecialchars($usuario['nome']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="livro_id">Livro:</label>
    <select name="livro_id" id="livro_id" required>
        <?php foreach ($livros as $livro): ?>
            <option value="<?= htmlspecialchars($livro['id']) ?>"><?= htmlspecialchars($livro['titulo']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="data_devolucao_prevista">Data de Devolução Prevista:</label>
    <input type="date" name="data_devolucao_prevista" id="data_devolucao_prevista" required><br><br>

    <button type="submit">Adicionar</button>
</form>

<?php
require_once '../includes/footer.php';
?>
