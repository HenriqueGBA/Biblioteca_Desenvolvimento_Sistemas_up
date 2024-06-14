<?php
include('../../controller/clienteController.php');
include('../../model/conexao.php');
include('../../protect.php');
$controller = new clientecontroller($pdo);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    if (empty($nome) || empty($email) || empty($telefone) || empty($cpf)) {
        $erro = "Todos os campos são obrigatórios!";
    } else {
        $controller->cadastrar($nome, $email, $telefone, $cpf);
        header('Location: listarCliente.php');
        exit;
    }
    $controller -> cadastrar($nome, $email, $telefone, $cpf);
}
?>

<link rel="stylesheet" href="../css/style.css">

<header>
<h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../painel.php">Home</a></li>
            <li><a href="./listarCliente.php">Lista de Clientes</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>   
    <h2>Cadastrar Cliente</h2>

<body>
<?php if (isset($erro)): ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php endif; ?>

    <form action="" method="post">
        <p>
            Cadastro de Cliente
        </p>
        <label>Nome:</label>
        <input type="text" name="nome" id="nome"><br>
        <label>E-mail:</label>
        <input type="email" name="email" id="email"><br>
        <label>Telefone:</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label>CPF:</label>
        <input type="text" name="cpf" id="cpf"><br>
        <button type="submit" name="criar">Continuar</button>
    </form>
    
</body>
<div>
   <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
</div>
</html>