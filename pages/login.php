<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
</head>
<body>
    <h2>🔒 Acesse sua Conta</h2>
    
    <form action="../includes/auth.php" method="POST">
        
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="usuario" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
