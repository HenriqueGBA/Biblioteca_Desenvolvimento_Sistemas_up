<?php
require_once '../../model/conexao.php';
require_once '../../model/Emprestimo.php';

$emprestimo = new Emprestimo($pdo);

$id = $_GET['id'];
$emprestimo->excluir($id);
$mensagem = "Empréstimo excluído com sucesso.";

header("Location: listar.php?mensagem=" . urlencode($mensagem));
exit;
?>
