<?php
include './../../controller/livroController.php';
include './../../model/conexao.php';

$controller = new LivroController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    if (empty($titulo) || empty($autor) || empty($ano)) {
        $error = "Preencha todos os campos.";
    } else {
        $controller->adicionar($titulo, $autor, $ano);
        header('Location: listar.php');
        exit;
    }
}
?>
<link rel="stylesheet" href="./../style.css">
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
        </ul>
    </nav>
    <h2>Adicionar Livro</h2>

<?php if (isset($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="adicionar.php" method="post">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required><br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required><br>
    <label for="ano">Ano:</label>
    <input type="number" name="ano" id="ano" required><br>
    <input type="submit" value="Adicionar">
</form>

</header>