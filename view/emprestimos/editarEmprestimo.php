<?php
require_once '../../model/conexao.php';
require_once '../../model/Emprestimo.php';

$emprestimo = new Emprestimo($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $dataDevolucaoPrevista = $_POST['data_devolucao_prevista'];
    $emprestimo->editar($id, $dataDevolucaoPrevista);
    $mensagem = "Empréstimo atualizado com sucesso.";
    header("Location: listar.php?mensagem=" . urlencode($mensagem));
    exit;
} else {
    $id = $_GET['id'];
    $emprestimoAtual = $emprestimo->buscarPorId($id);
}

$pageTitle = "Editar Empréstimo";
require_once '../includes/header.php';
?>

<h2>Editar Empréstimo</h2>

<form action="editar.php" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($emprestimoAtual['id']) ?>">
    <label for="data_devolucao_prevista">Data de Devolução Prevista:</label>
    <input type="date" name="data_devolucao_prevista" id="data_devolucao_prevista" value="<?= htmlspecialchars($emprestimoAtual['data_devolucao_prevista']) ?>" required><br>
    <button type="submit">Atualizar</button>
</form>

<?php
require_once '../includes/footer.php';
?>
