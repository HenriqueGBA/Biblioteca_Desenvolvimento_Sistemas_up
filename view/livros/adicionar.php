<?php
include './../../controller/livroController.php';
include './../../model/conexao.php';

$controller = new LivroController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? '';

    if (empty($titulo) || empty($autor) || empty($ano)) {
        $erro = "Todos os campos são obrigatórios!";
    } else {
        $controller->adicionar($titulo, $autor, $ano);
        header('Location: listar.php');
        exit;
    }
}
?>
<link rel="stylesheet" href="../css/style.css">

<header>
<h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="/view/index.php">Home</a></li>
            <li><a href="../view/livros/listar.php">Livros Disponiveis</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>   
    <h2>Adicionar Livro</h2>

<?php if (isset($erro)): ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php endif; ?>

<form action="adicionar.php" method="post">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo"><br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor"><br>
    <label for="ano">Ano:</label>
    <input type="number" name="ano" id="ano"><br>
    <input type="submit" value="Adicionar">
</form>

<div>
   <footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>
</div>