<!-- 2ª Digitação (Aqui) -->
<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = ($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        header('Location: main_page.php');
    } else {
        $error = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="body_login">
    <div class="container" style="width: 400px;">
        <h3>Login</h3>
        <form method="post" action="">
            <label for="usuario">Usuario :</label>
                    <input type="text" name="usuario" required>
                    <label for="senha">Senha :</label>
                            <input type="password" name="senha" required>
                            <button type="submit" style="margin-bottom: 30px;">Entrar</button>
                            <?php if (isset($error)) echo "<p class='message error' >$error</p>"; ?><a href="index.php" class="button" >Cancelar</a>
        </form>
    </div>
</body>

</html>