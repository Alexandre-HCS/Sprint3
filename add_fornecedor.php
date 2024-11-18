<?php

require 'conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br" scro>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/page_logo.png" type="image/png">
    <title>Dr.Peanuts</title>
</head>
<body>
<h1>Adicionar Fornecedor</h1>    
    <div class="add">
        <form action="add_fornecedor" method="POST">
        <label>Nome Fornecedor</label>
        <input type="text" name="nomefornecedor" require>
        
        <label>CNPJ</label>
        <input type="number" name="cnpj" require>
        
        <label>Endereço</label>
        <input type="text" name="endereco">
        
        <label>Telefone</label>
        <input type="number" name="telefone">

        <label>Email</label>
        <input type="text" name="email" require>

        <label>Observações</label>
        <input type="text" name="observacoes">

        <input type="submit" value="Adicionar Fornecedor">
        </form>
    </div>
    <br>
    <h2>Lista de fornecedores</h2>
    <div>
        <?php  include 'read_fornecedore.php'; 
        
        ?>
    </div>
        </body>

</html>