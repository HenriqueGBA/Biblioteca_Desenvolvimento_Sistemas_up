<?php
include_once __DIR__ . './../model/conexao.php';
include_once __DIR__ . './../model/Livro.php';

class LivroController {
    private $livro;

    public function __construct($pdo) {
        $this->livro = new Livro($pdo);
    }

    public function listar() {
        return $this->livro->listar();
    }

    public function adicionar($titulo, $autor, $ano) {
        $this->livro->adicionar($titulo, $autor, $ano);
    }

    public function editar($id, $titulo, $autor, $ano) {
        $this->livro->editar($id, $titulo, $autor, $ano);
    }

    public function deletar($id) {
        $this->livro->deletar($id);
    }

    public function buscarPorId($id) {
        return $this->livro->buscarPorId($id);
    }
}
?>