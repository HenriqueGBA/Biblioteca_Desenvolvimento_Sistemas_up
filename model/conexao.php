<?php 
try{
    $pdo = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', 'admin');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
}catch(PDOException $erro){
    echo "ERRO => " . $erro->getMessage();
}
?>]