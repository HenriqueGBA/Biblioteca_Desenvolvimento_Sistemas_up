<?php
include('../model/conexao.php');

function cadastrarUsuario($nome, $email, $senha, $senhaConfirm) {
    global $pdo;

    if (empty($nome) || empty($email) || empty($senha) || empty($senhaConfirm)) {
        return "Todos os campos são obrigatórios.";
    }

    if ($senha !== $senhaConfirm) {
        return "As senhas não coincidem.";
    }

    // Criptografar a senha cadastrada
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
        
    if ($stmt->execute()) {
        header("Location: ../view/login.php");
        exit();
    } else {
        return "Erro ao cadastrar usuário.";
    }
}
?>