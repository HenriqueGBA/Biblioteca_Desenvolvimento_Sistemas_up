<?php
include_once __DIR__ . '/model/conexao.php';
include_once __DIR__ . '/model/Livro.php';

if (!isset($pdo)) {
    die('Erro ao conectar ao banco de dados.');
}

$livro = new Livro($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $livro->editar($id, $titulo, $autor, $ano);
    header('Location: listar.php');
    exit;
} else {
    $id = $_GET['id'];
    $livroAtual = $livro->buscarPorId($id);
}
?>

<h2>Editar Livro</h2>

<form action="editar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $livroAtual['id']; ?>">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($livroAtual['titulo']); ?>" required><br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($livroAtual['autor']); ?>" required><br>
    <label for="ano">Ano:</label>
    <input type="number" name="ano" id="ano" value="<?php echo htmlspecialchars($livroAtual['ano']); ?>" required><br>
    <input type="submit" value="Atualizar">
</form>
