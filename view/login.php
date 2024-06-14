<?php
include('../controller/loginController.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="background-color:coral; margin:10px">
        <?php
        echo $erro ?? '';
        ?>
    </div>

    <form action="" method="POST">
        <input type="text" name="email" placeholder="Digite seu email"><br><br>
        <input type="password" name="senha" placeholder="Digite sua senha"><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <p>
        <a href="./cadastraUsuario.php">Cadastrar-se</a>
    </p>
</body>

</html>