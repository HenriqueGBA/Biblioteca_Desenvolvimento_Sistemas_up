<?php
include '../../controller/livroController.php';
include '../../model/conexao.php';



$controller = new LivroController($pdo);
$livros = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livros</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../livros/listar.php">Livros Disponíveis</a></li>
            <li><a href="../login.php">Login</a></li>
        </ul>
    </nav>
</header>

<h2>Lista de Livros</h2>

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
            <td>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div>
    <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
</div>

</body>
</html>
