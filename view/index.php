<?php
include_once('../model/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="../view/livros/listar.php">Livros Disponiveis</a></li>
            <li><a href="../view/login.php">Login</a></li>
            <li><a href="./CRUD_USUARIOS/criar_usuario.php">cadastrar novo usuario</a></li>
            <li><a href="./CRUD_USUARIOS/listar_usuarios.php">listar usuarios cadastrados</a></li>
            <li><a href="./CRUD_USUARIOS/atualizar_usuario.php">atualizar usuarios cadastrados</a></li>
            <li><a href="./CRUD_USUARIOS/atualizar_usuario.php">atualizar usuarios cadastrados</a></li>
            <li><a href="../views/emprestimos/listar.php">Empréstimos</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>Bem-vindo à Biblioteca</h1>
    <p>Explore nossos livros e aproveite a leitura!</p>
</main>
    <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
