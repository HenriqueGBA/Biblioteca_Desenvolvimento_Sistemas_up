<?php
include_once '../../model/conexao.php';
include_once '../../controller/livroController.php';

$controller = new LivroController($pdo);

if (!isset($pdo)) {
    die('Erro ao conectar ao banco de dados.');
}

if (!isset($_GET['idlivro'])) {
    echo "ID do livro não fornecido.";
    exit;
}

$id = $_GET['idlivro'];

$livroAtual = $controller->buscarPorId($id);

if (!$livroAtual) {
    die('Livro não encontrado.');
}

$controller->deletar($id);

header('Location: listar.php');
exit;
?>
