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
    die('cliente não encontrado.');
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if (empty($nome) || empty($email) || empty($telefone)) {
        $erro = "Todos os campos são obrigatórios!";
    } else {
        $controller->editar($id, $nome, $email, $telefone);
        header('Location: listarCliente.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../clientes/listarCliente.php">Listar Clientes</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>

<h2>Editar cliente</h2>
<?php if (!empty($erro)): ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php endif; ?>

<form action="editarCliente.php?id_cliente=<?php echo $id; ?>" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($clienteAtual['nome']); ?>"><br>
    <label for="email">email:</label>
    <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($clienteAtual['email']); ?>"><br>
    <label for="telefone">telefone:</label>
    <input type="number" name="telefone" id="telefone" value="<?php echo htmlspecialchars($clienteAtual['telefone']); ?>"><br>
    <input type="submit" value="Atualizar">
</form>

<div>
    <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
</div>

</body>
</html>
