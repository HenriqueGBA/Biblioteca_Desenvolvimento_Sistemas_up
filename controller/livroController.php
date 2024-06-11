<?php
require_once '../model/Livro.php';

$livro = new Livro($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $ano = trim($_POST['ano']);

    if (empty($titulo) || empty($autor) || empty($ano)) {
        $erro = "Preencha todos os campos!";
    } else {
        $livro->adicionar($titulo, $autor, $ano);
        header('Location: ../views/livros/listar.php');
        exit;
    }
}
?>