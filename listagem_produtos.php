<!-- 4ª Digitação (Aqui) -->

<?php include('valida_sessao.php'); ?>
<?php include('conexao.php'); ?>


<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM produto WHERE id='$delete_id'";
    if ($conn->query($sql) === TRUE) {
        $mensagem = "Produto excluído com sucesso!";
    } else {
        $mensagem = "Erro ao excluir produto: " . $conn->error;
    }
}
$produtos = $conn->query("SELECT p.id, p.nome, p.estoque, p.descricao, p.preco, p.imagem, f.nome AS fornecedor_nome FROM produto p JOIN fornecedor f ON p.fornecedor_id = f.id");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<header>
        <img src="Imagens\logo.jpg" alt="">
        <h1>SITE DE GERENCIAMENTO <span class="tm">Dr.Peanut®</span></h1>
        <a href="main_page.php" class="back-button">Voltar</a>
    </header>
    <div class="container">
    <h2>Listagem de Produtos</h2>
    <?php include('estoque.php'); ?>
    <?php include('pesquisa.php'); ?>
        <!-- Tabela para listar os produtos cadastrados -->
        <div class="tabela">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Fornecedor</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $produtos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['estoque']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><?php echo 'R$ ' . number_format($row['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $row['fornecedor_nome']; ?></td>
                        <td>
                            <?php if ($row['imagem']): ?>
                                <img src="<?php echo $row['imagem']; ?>" alt="Imagem do produto" class="thumbnail">
                            <?php else: ?>
                                Sem imagem
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?edit_id=<?php echo $row['id']; ?>">Editar</a>
                            <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>