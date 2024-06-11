<?php
include 'conexao.php';

try {
    $sql = "SELECT id, nome, email, telefone, cpf FROM usuarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['telefone'] ?></td>
            <td><?= $usuario['cpf'] ?></td>
            <td>
                <a href="update.php?id=<?= $usuario['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $usuario['id'] ?>"
                    onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>