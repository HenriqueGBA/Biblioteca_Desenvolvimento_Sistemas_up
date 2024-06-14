<?php
include '../../controller/livroController.php';
include '../../model/conexao.php';
include('../../protect.php');

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
            <li><a href="../painel.php">Home</a></li>
            <li><a href="listar.php">Livros Disponíveis</a></li>
            <li><a href="../login.php">Login</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Lista de Livros</h2>
    <button class="btn btn-primary" type="button" onclick="window.location.href='adicionar.php'">Adicionar Livro</button>

    <table>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                <td><?php echo htmlspecialchars($livro['ano']); ?></td>
                <td class="action-buttons">
                    <button class="btn btn-secondary" type="button" onclick="window.location.href='editar.php?id_livro=<?php echo htmlspecialchars($livro['id_livro']); ?>'">Editar</button>
                    <button class="btn btn-danger" type="button" onclick="if(confirm('Tem certeza que deseja deletar este livro?')) { window.location.href='deletar.php?id_livro=<?php echo htmlspecialchars($livro['id_livro']); ?>'; }">Deletar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<footer>
    <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
</footer>

</body>
</html>
