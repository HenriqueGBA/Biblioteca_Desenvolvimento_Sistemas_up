<?php
include('../controller/loginController.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <!-- <header>
        <h1>Biblioteca</h1>
        <nav>
            <ul>
                <li><a href="../view/index.php">Home</a></li>
                <li><a href="../view/livros/listarlivros.php">Livros Disponiveis</a></li>
                <li><a href="../view/login.php">Login</a></li>
            </ul>
        </nav>
    </header> -->
    <div style="background-color:coral; margin:10px">
        <?php
        echo $erro ?? '';
        ?>
    </div>

    <form action="" method="POST">
        <p>Faça seu login</p>
        <label for='email'>Email:<input type="text" name="email" placeholder=" Digite seu email"><br><br>
        <label for='password'>Senha:<input type="password" name="senha" placeholder=" Digite sua senha"><br><br>
        <button type="submit" name="login">Continuar</button>
        <br><a href="./cadastraUsuario.php">Ainda não sou cadastrado</a>
        <br><a href="./index.php">Voltar</a>
    </form>
</body>

</html>