<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <?php
    include('../controller/loginController.php');

    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<script>alert('Usuário cadastrado com sucesso. Faça o login.');</script>";
    }
    ?>

    <div style="background-color:coral; margin:10px">
        <?php 
            if (isset($erro)) {
                echo $erro;
            }
        ?>
    </div>

    <form action="" method="POST">
        <p>Faça seu login</p>
        <label for='email'>Email:<input type="text" name="email" placeholder=" Digite seu email"><br><br>
        <label for='password'>Senha:<input type="password" name="senha" placeholder=" Digite sua senha"><br><br>
        <button type="submit" name="login">Continuar</button>
        <br><a href="./cadastraUsuario.php">Ainda não sou cadastrado</a>
        <br><a href="javascript:history.go(-1)">Voltar</a>
    </form>
</body>
</html>
