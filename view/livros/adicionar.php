<header>
<h1>Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="../view/livros/listar.php">Livros Disponiveis</a></li>
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<h2>Adicionar Livro</h2>

<?php if (isset($erro)): ?>
    <p style="color: red;"><?php echo $erro; ?></p>
<?php endif; ?>

<form action="../../controller/livroController.php" method="post">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']; ?>"><br>

    <label for="autor">Autor</label>
    <input type="text" name="autor" id="autor" value="<?php if(isset($_POST['autor'])) echo $_POST['autor']; ?>"><br>

    <label for="ano">Ano</label>
    <input type="text" name="ano" id="ano" value="<?php if(isset($_POST['ano'])) echo $_POST['ano']; ?>"><br>

    <button type="submit">Adicionar</button>
</form>
<footer>
        <p>&copy; 2024 Biblioteca. Todos os direitos reservados.</p>
    </footer>