<?php
require_once "../includes/protecao_login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Contato</title>
</head>
<link rel="stylesheet" href="../assets/css/style.css">
<body>
    <h2>Cadastrar Contato</h2>
    <form action="../includes/cadastrar.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label>
        <input type="email" name="email"><br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone"><br><br>

        <button type="submit">Salvar</button>
        <a href='../pages/main.php'>Voltar à lista</a>
    </form>
</body>
<script src="../assets/js/script.js"></script>
</html>