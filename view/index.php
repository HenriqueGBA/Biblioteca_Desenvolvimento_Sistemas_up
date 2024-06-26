<?php
include_once('../model/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="./css/styleIndex.css">
</head>
<body>
<header>
<h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="../view/livros/listarlivros.php">Livros Disponiveis</a></li>
            <li><a href="../view/sobreNos.php">Sobre nós</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<section class="welcome">
        <div class="container">
            <h1>Bem-vindo à Biblioteca</h1>
            <p>Explore nossos livros e aproveite a leitura!</p>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <h2>Sobre a Biblioteca</h2>
            <p>Bem-vindo ao nosso sistema de gestão de biblioteca! Este projeto foi desenvolvido com o objetivo de facilitar a administração de uma biblioteca, fornecendo uma interface intuitiva e ferramentas poderosas para gerenciar o acervo de livros, usuários e suas interações com a biblioteca.</p>
        </div>
    </section>
</main>
   <div>
   <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
    </div>
</body>

</html>
