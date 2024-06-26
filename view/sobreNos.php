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
    <section class="about">
        <div class="container">
            <h2>Sobre a Biblioteca</h2>
            <p>A nossa biblioteca oferece uma vasta coleção de livros dos mais diversos gêneros e autores. Aqui você pode encontrar desde clássicos da literatura até lançamentos recentes. Venha descobrir novos mundos através da leitura!</p>
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
