<?php
include('../model/conexao.php');

session_start();

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (empty($_POST['email'])) {
        $erro = "Preencha seu email";
    } else if (empty($_POST['senha'])) {
        $erro = "Preencha sua senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $quantidade = $stmt->rowCount();

        if ($quantidade == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit();
        } else {
            $erro = "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}

if (isset($_GET['erro'])) {
    $erro = "É necessário logar para acessar o sistema";
}