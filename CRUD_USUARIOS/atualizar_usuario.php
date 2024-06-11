<?php
include 'conexao.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    try {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Usuário atualizado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    $conn = null;
} else {
    try {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch();
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Atualizar Usuário</h2>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>
        Telefone: <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" required><br><br>
        CPF: <input type="text" name="cpf" value="<?= $usuario['cpf'] ?>" required><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>

</html>