<?php
include('../controller/cadastroLoginController.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaConfirm = $_POST['senhaConfirm'];

    $mensagem = cadastrarUsuario($nome, $email, $senha, $senhaConfirm);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Cadastro de Usuario</title>
</head>

<body>
    <?php if ($mensagem) : ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <p>
            Cadastro de Usuário
        </p>
        <label>Nome:</label>
        <input type="text" name="nome" id="nome"><br>
        <label>E-mail:</label>
        <input type="email" name="email" id="email"><br>
        <label>Senha:</label>
        <input type="password" name="senha" id="senha"><br>
        <label>Confirmar Senha:</label>
        <input type="password" name="senhaConfirm" id="senhaConfirm"><br>
        <button type="submit" name="criar">Continuar</button>
    </form>
</body>

</html>