<?php
include('../model/conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (empty($_POST['email'])) {
        $erro = "Preencha seu email";
    } else if (empty($_POST['senha'])) {
        $erro = "Preencha sua senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            
            if (!isset($_SESSION)) {
                session_start();
            }

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