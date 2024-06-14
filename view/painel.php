<?php
include('../protect.php');
include_once('../model/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Funcionário</title>
    <link rel="stylesheet" href="./css/styleIndexFuncionario.css">
</head>
<body>
<header>
    <h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../view/painel.php">Home</a></li>
            <li><a href="../view/livros/listar.php">Listar Livros</a></li>
            <li><a href="../view/emprestimos.php">Empréstimos</a></li>
            <li><a href="../view/clientes/criarCliente.php">Cadastrar Cliente</a></li>
            <li><a href="../view/clientes/listarCliente.php">Listar Clientes</a></li>
            <li><a href="../logout.php">Sair</a></li>
        </ul>
    </nav>
</header>
<main>
    <section class="welcome">
        <div class="container">
            <h1>Bem-vindo, Funcionário!</h1>
            <p>Utilize o menu acima para gerenciar os livros, realizar empréstimos e cadastrar novos clientes. Seu trabalho ajuda a manter nossa biblioteca organizada e eficiente!</p>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <h2>Funcionalidades Disponíveis</h2>
            <div class="card-container">
                <div class="card">
                    <h3><a href="../view/livros/listar.php">Listar Livros</a></h3>
                    <p>Gerencie o acervo de livros</p>
                </div>
                <div class="card">
                    <h3><a href="../view/emprestimos.php">Empréstimos</a></h3>
                    <p>Realize e gerencie empréstimos</p>
                </div>
                <div class="card">
                    <h3><a href="../view/clientes/criarCliente.php">Cadastrar Cliente</a></h3>
                    <p>Cadastre novos clientes</p>
                </div>
                <div class="card">
                    <h3><a href="../view/emprestimos.php">Verificar Empréstimos</a></h3>
                    <p>Verifique a situação dos empréstimos</p>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
</footer>
</body>
</html>
