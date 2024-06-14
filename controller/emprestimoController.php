<?php
require_once '../model/conexao.php';
require_once '../model/Emprestimo.php';
require_once '../model/Livro.php';
require_once '../model/Usuario.php';

$emprestimo = new Emprestimo($pdo);
$livro = new Livro($pdo);
$usuario = new Usuario($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioId = $_POST['usuario_id'];
    $livroId = $_POST['livro_id'];
    $dataEmprestimo = date('Y-m-d');
    $dataDevolucaoPrevista = $_POST['data_devolucao_prevista'];

    // Verificar se o usuário e o livro existem
    if (!$usuario->buscarPorId($usuarioId)) {
        $mensagem = "Usuário não encontrado.";
    } elseif (!$livro->buscarPorId($livroId)) {
        $mensagem = "Livro não encontrado.";
    } elseif (!$livro->verificarDisponibilidade($livroId)) {
        $mensagem = "Livro não está disponível.";
    } else {
        // Adicionar o empréstimo
        $emprestimo->adicionar($usuarioId, $livroId, $dataEmprestimo, $dataDevolucaoPrevista);
        $mensagem = "Empréstimo adicionado com sucesso.";
    }

    // Redirecionar com mensagem de feedback
    header("Location: ../views/emprestimos/listar.php?mensagem=" . urlencode($mensagem));
    exit;
}
?>
