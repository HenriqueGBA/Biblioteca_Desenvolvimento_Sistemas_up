<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    try {
        $sql = "INSERT INTO usuarios (nome, email, telefone, cpf) VALUES (:nome, :email, :telefone, :cpf)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        echo "Novo usuário criado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Telefone: <input type="text" name="telefone" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>