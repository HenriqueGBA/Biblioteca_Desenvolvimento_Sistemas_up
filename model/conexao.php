<?php 
try{
    $pdo = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso!";
    return $pdo;
}catch(PDOException $erro){
    echo "ERRO => " . $erro->getMessage();
}
?>]