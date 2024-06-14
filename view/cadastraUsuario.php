<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Cadastro de Usuario</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('../model/UsuarioLogin.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaConfirm = $_POST['senhaConfirm'];

        if ($senha !== $senhaConfirm) {
            $mensagem = "As senhas não coincidem.";
        } else {
            $usuario = new UsuarioLogin($nome, $email, $senha);
            $mensagem = $usuario->cadastrar();
        }

        if (isset($mensagem)) {
            echo "<script>alert('$mensagem');</script>";
        }
    }
    ?>
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
        <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
    </form>
</body>
</html>