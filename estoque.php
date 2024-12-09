<?php
$sql = "SELECT nome, estoque FROM produto";
$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['estoque'] <= 0) {
            // Mensagem para estoque vazio
            echo "<p class='falta'>Estoque de " . $row['nome'] . " está vazio! Necessário reabastecer.</p>";
        } elseif ($row['estoque'] > 0 && $row['estoque'] <= 10) {
            // Mensagem para estoque entre 1 e 10
            echo "<p class='falta'>Atenção: Estoque de " . $row['nome'] . " está baixo! Apenas " . $row['estoque'] . " disponível.</p>";
        }
    }
}
?>
</body>
</html>