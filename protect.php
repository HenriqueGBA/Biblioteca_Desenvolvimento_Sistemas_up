<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['nome'])) {
    die("Você não tem permissão para acessar esta página. <p><a href=./login.php>entrar</a></p>");
}
