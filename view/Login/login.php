<?php
    include('../../model/conexao.php');

    if(isset($_POST['email']) && isset($_POST['senha'])) {
        if(empty($_POST['email'])) {
            echo "Preencha seu email";
        } else if (empty($_POST['senha'])) {
            echo "Preencha sua senha";
        } else {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            $quantidade = $stmt->rowCount();

            if($quantidade == 1) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: ../../pages/indexLogin.php");
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }
        }
    }

    if(isset($_GET['erro'])) {
        $erro = "É necessário logar para acessar o sistema";
    }
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
                //Se tiver erro printa na tela, senão coloca vazio
                echo $erro ?? '';
            ?>
        </div>

        <form action="" method="post">
            <input type="text" name="email" placeholder="email"><br><br>
            <input type="password" name="senha" placeholder="Digite sua senha"><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>