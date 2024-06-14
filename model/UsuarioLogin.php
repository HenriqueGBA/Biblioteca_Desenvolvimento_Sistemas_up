<?php
include_once('conexao.php');

class UsuarioLogin {

    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function 
    cadastrar() {
        global $pdo;
        try {
            $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);

            $sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
            $sql->bindParam(':nome', $this->nome);
            $sql->bindParam(':email', $this->email);
            $sql->bindParam(':senha', $senhaHash);

            if ($sql->execute()) {
                header("Location: ../view/login.php?success=1");
                exit();
            } else {
                return "Erro ao cadastrar usuário.";
            }
        } catch (PDOException $erro) {
            return "Cadastro falhou! " . $erro->getMessage();
        }
    }
}
?>
