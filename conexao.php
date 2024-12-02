<!-- 1ª Digitação (Aqui) -->
<?php
$servername = "localhost:3309";
$username = "root";
$password = "";
$dbname = "drpeanut";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Adiciona a coluna 'imagem' à tabela 'produtos' se ela nao existir
$sql = "SHOW COLUMNS FROM produto LIKE 'imagem'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "ALTER TABLE produto ADD COLUMN imagem VARCHAR(255)";
    $conn->query($sql);
}
// Adiciona a coluna 'imagem' à tabela 'fornecedores' se ela não existir
$sql = "SHOW COLUMNS FROM fornecedor LIKE 'imagem' ";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "ALTER TABLE fornecedor ADD COLUMN imagem VARCHAR(255)";
    $conn->query($sql);
}
?>