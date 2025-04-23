<?php
header('Content-Type: application/json');

require_once 'bancodedados/conexao.php';

try {
    $sql = "SELECT nome, preco FROM produtos"; // Altere para os campos reais
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($produtos);
} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro ao buscar produtos: " . $e->getMessage()]);
}
?>
