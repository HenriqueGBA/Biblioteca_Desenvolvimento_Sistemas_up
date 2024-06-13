<?php
class Livro {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM livro");
        return $stmt->fetchAll();
    }

    public function adicionar($titulo, $autor, $ano) {
        $sql = "INSERT INTO livro (titulo, autor, ano) VALUES (:titulo, :autor, :ano)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['titulo' => $titulo, 'autor' => $autor, 'ano' => $ano]);
    }

    public function editar($id, $titulo, $autor, $ano) {
        $sql = "UPDATE livro SET titulo = :titulo, autor = :autor, ano = :ano WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['titulo' => $titulo, 'autor' => $autor, 'ano' => $ano, 'id' => $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM livro WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM livro WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
?>