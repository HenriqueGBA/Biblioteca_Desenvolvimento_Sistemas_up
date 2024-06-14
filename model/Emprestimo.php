<?php
class Emprestimo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionar($usuarioId, $livroId, $dataEmprestimo, $dataDevolucaoPrevista) {
        $query = "INSERT INTO emprestimos (usuario_id, livro_id, data_emprestimo, data_devolucao_prevista) VALUES (:usuario_id, :livro_id, :data_emprestimo, :data_devolucao_prevista)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuarioId);
        $stmt->bindParam(':livro_id', $livroId);
        $stmt->bindParam(':data_emprestimo', $dataEmprestimo);
        $stmt->bindParam(':data_devolucao_prevista', $dataDevolucaoPrevista);
        $stmt->execute();

        // Atualizar a disponibilidade do livro
        $queryAtualizar = "UPDATE livros SET disponivel = 0 WHERE id = :livro_id";
        $stmtAtualizar = $this->pdo->prepare($queryAtualizar);
        $stmtAtualizar->bindParam(':livro_id', $livroId);
        $stmtAtualizar->execute();
    }

    public function listar() {
        $query = "SELECT e.id, u.nome AS usuario, l.titulo AS livro, e.data_emprestimo, e.data_devolucao_prevista FROM emprestimos e JOIN usuarios u ON e.usuario_id = u.id JOIN livros l ON e.livro_id = l.id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM emprestimos WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $dataDevolucaoPrevista) {
        $query = "UPDATE emprestimos SET data_devolucao_prevista = :data_devolucao_prevista WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':data_devolucao_prevista', $dataDevolucaoPrevista);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function excluir($id) {
        // Obter o ID do livro antes de excluir o empréstimo
        $queryLivroId = "SELECT livro_id FROM emprestimos WHERE id = :id";
        $stmtLivroId = $this->pdo->prepare($queryLivroId);
        $stmtLivroId->bindParam(':id', $id);
        $stmtLivroId->execute();
        $livroId = $stmtLivroId->fetchColumn();

        // Excluir o empréstimo
        $query = "DELETE FROM emprestimos WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Atualizar a disponibilidade do livro
        $queryAtualizar = "UPDATE livros SET disponivel = 1 WHERE id = :livro_id";
        $stmtAtualizar = $this->pdo->prepare($queryAtualizar);
        $stmtAtualizar->bindParam(':livro_id', $livroId);
        $stmtAtualizar->execute();
    }
}
?>
