<?php
include_once '../../model/conexao.php';
include_once '../../controller/livroController.php';

$controller = new LivroController($pdo);

if (!isset($pdo)) {
    die('Erro ao conectar ao banco de dados.');
}

if (!isset($_GET['id_livro'])) {
    echo "ID do livro não fornecido.";
    exit;
}

$id = $_GET['id_livro'];
$livroAtual = $controller->buscarPorId($id);

if (!$livroAtual) {
    die('Livro não encontrado.');
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    if (empty($titulo) || empty($autor) || empty($ano)) {
        $erro = "Todos os campos são obrigatórios!";
    } else {
        $controller->editar($id, $titulo, $autor, $ano);
        header('Location: listar.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../livros/listar.php">Livros Disponíveis</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>

<h2>Editar Livro</h2>
<?php if (!empty($erro)): ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php endif; ?>

<form action="editar.php?id_livro=<?php echo $id; ?>" method="post">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($livroAtual['titulo']); ?>"><br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($livroAtual['autor']); ?>"><br>
    <label for="ano">Ano:</label>
    <input type="number" name="ano" id="ano" value="<?php echo htmlspecialchars($livroAtual['ano']); ?>"><br>
    <input type="submit" value="Atualizar">
</form>

<div>
    <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
</div>

</body>
</html>
