<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="login-body">

    <form class="login-form" action="../includes/auth.php" method="POST">
        <h2>Acesse sua Conta</h2>

        <label for="username">Usuário:</label>
        <input type="text" id="username" name="usuario" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="senha" required>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>
