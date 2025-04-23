<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'nome_do_seu_banco'; // Troque aqui

try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro na conexão: " . $e->getMessage()]);
    exit;
}
?>
