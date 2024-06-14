<?php
include_once __DIR__ . './../model/conexao.php';
include_once __DIR__ . './../model/Cliente.php';

class clienteController {
    private $cliente;

    public function __construct($pdo) {
        $this->cliente = new Cliente($pdo);
    }

    public function listar() {
        return $this->cliente->listar();
    }

    public function cadastrar($nome, $email, $telefone, $cpf) {
        $this->cliente->cadastrar($nome, $email, $telefone, $cpf);
    }

    public function editar($id, $nome, $email, $telefone, $cpf) {
        $this->cliente->editar($id, $nome, $email, $telefone, $cpf);
    }

    public function deletar($id) {
        $this->cliente->deletar($id);
    }

    public function buscarPorId($id) {
        return $this->cliente->buscarPorId($id);
    }
}
?>