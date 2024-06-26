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
        $sql = "UPDATE livro SET titulo = :titulo, autor = :autor, ano = :ano WHERE id_livro = :id_livro";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['titulo' => $titulo, 'autor' => $autor, 'ano' => $ano, 'id_livro' => $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM livro WHERE id_livro = :id_livro";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_livro' => $id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM livro WHERE id_livro = :id_livro";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_livro' => $id]);
        return $stmt->fetch();
    }
    
    public function listarDisponiveis() {
        $query = "SELECT * FROM livros WHERE disponivel = 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function buscarPorId($id) {
    //     $query = "SELECT * FROM livros WHERE id = :id";
    //     $stmt = $this->pdo->prepare($query);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    public function verificarDisponibilidade($id) {
        $query = "SELECT disponivel FROM livro WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchColumn() == 1;
    }
}
?>