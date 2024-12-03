<!-- barra_pesquisa.php -->
<form method="GET" action="">
    <input type="text" name="pesquisa" placeholder="Pesquisar produtos ou fornecedores..." value="<?php echo isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : ''; ?>">
    <input type="submit" value="Pesquisar" class="pesquisar">
</form>

<?php
// Verifica se a pesquisa foi feita
$pesquisa = '';
if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

// Consulta para buscar produtos com base na pesquisa
if ($pesquisa) {
    $sql = "SELECT p.id, p.nome, p.estoque, p.descricao, p.preco, p.imagem, f.nome AS fornecedor_nome 
            FROM produto p 
            JOIN fornecedor f ON p.fornecedor_id = f.id 
            WHERE p.nome LIKE ? OR f.nome LIKE ?";
    $stmt = $conn->prepare($sql);
    
    // Prepara a pesquisa para ambas as colunas
    $likePesquisa = '%' . $pesquisa . '%';
    $stmt->bind_param("ss", $likePesquisa, $likePesquisa); // Bind para duas colunas
    $stmt->execute();
    $produtos = $stmt->get_result();
} else {
    // Se não houver pesquisa, busca todos os produtos
    $produtos = $conn->query("SELECT p.id, p.nome, p.estoque, p.descricao, p.preco, p.imagem, f.nome AS fornecedor_nome 
                               FROM produto p 
                               JOIN fornecedor f ON p.fornecedor_id = f.id");
}
?>