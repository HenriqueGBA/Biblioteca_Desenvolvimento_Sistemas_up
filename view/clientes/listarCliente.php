<?php
include '../../controller/clienteController.php';
include '../../model/conexao.php';
include('../../protect.php');

$controller = new clienteController($pdo);
$clientes = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../painel.php">Home</a></li>
            <li><a href="listarCliente.php">Listar Clientes</a></li>
            <li><a href="../login.php">Login</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Lista de Clientes</h2>
    <button class="btn btn-primary" type="button" onclick="window.location.href='adicionar.php'">Adicionar cliente</button>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $clientes): ?>
            <tr>
                <td><?php echo htmlspecialchars($clientes['nome']); ?></td>
                <td><?php echo htmlspecialchars($clientes['email']); ?></td>
                <td><?php echo htmlspecialchars($clientes['telefone']); ?></td>
                <td><?php echo htmlspecialchars($clientes['cpf']); ?></td>
                <td class="action-buttons">
                    <button class="btn btn-secondary" type="button" onclick="window.location.href='editarCliente.php?id_cliente=<?php echo htmlspecialchars($clientes['id_cliente']); ?>'">Editar</button>
                    <button class="btn btn-danger" type="button" onclick="if(confirm('Tem certeza que deseja deletar este cliente?')) { window.location.href='deletarCliente.php?id_cliente=<?php echo htmlspecialchars($clientes['id_cliente']); ?>'; }">Deletar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<footer>
    <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
</footer>

</body>
</html>
