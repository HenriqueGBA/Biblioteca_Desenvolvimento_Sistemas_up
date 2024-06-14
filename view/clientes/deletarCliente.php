<?php
include_once '../../model/conexao.php';
include_once '../../controller/clienteController.php';

$controller = new clienteController($pdo);

if (!isset($pdo)) {
    die('Erro ao conectar ao banco de dados.');
}

if (!isset($_GET['id_cliente'])) {
    echo "ID do cliente não fornecido.";
    exit;
}

$id = $_GET['id_cliente'];

$clienteAtual = $controller->buscarPorId($id);

if (!$clienteAtual) {
    die('Livro não encontrado.');
}

$controller->deletar($id);

header('Location: listarCliente.php');
exit;
?>
