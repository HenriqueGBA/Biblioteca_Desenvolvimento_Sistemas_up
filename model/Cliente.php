<?php
include '../controller/clienteController.php';
class Cliente{
    
    private $pdo; 

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $email, $telefone, $cpf){
        $sql = "INSERT INTO cliente (nome, email, telefone, cpf) VALUES (:nome, :email, :telefone, :cpf)";
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'cpf' => $cpf]);
    }

    public function listar() {
        $query = "SELECT * FROM cliente";
        $stmt = $this->pdo->query("SELECT * FROM cliente");
        return $stmt->fetchAll();
    }
    
    public function buscarPorId($id) {
        $query = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_cliente', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function editar($id, $nome, $email, $telefone) {
        $sql = "UPDATE cliente SET nome = :nome, email = :email, telefone = :telefone WHERE id_cliente = :id_cliente";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'id_cliente' => $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_cliente' => $id]);
    }
}
?>