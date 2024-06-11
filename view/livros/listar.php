<?php
include '../../model/Livro.php';
include '../../model/conexao.php';

if (!isset($pdo)) {
    die('Erro ao conectar ao banco de dados.');
}

$livro = new Livro($pdo);
$livros = $livro->listar();
?>

<header>
<h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="./pages/livros/listar.php">Livros Disponiveis</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<h2>Lista de Livros</h2>
    <a href="adicionar.php">Adicionar Livro</a>
<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>
    <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
            <td><?php echo htmlspecialchars($livro['autor']); ?></td>
            <td><?php echo htmlspecialchars($livro['ano']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
</footer>