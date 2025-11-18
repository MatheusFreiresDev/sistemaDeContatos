<?php
require_once '../includes/db_conection.php';

// Puxa todos contatos
$sql = "SELECT * FROM contatos ORDER BY id DESC";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contatos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="topo">
    <h2>Lista de Contatos</h2>
    <form action="../includes/pesquisarPorNome.php">
    <input type="text" name="nome">
    </form>
    <a href="cadastro.html">
        <button class="botaoNovoContato">Novo Contato</button>
    </a>
</div>

<?php while($row = $result->fetch_assoc()): ?>
    <div class="card">
        <b><?= $row['nome'] ?></b><br>
        Email: <?= $row['email'] ?><br>
        Tel: <?= $row['telefone'] ?><br>

        <div class="botoes">
            <a href="../includes/editar.php?id=<?= $row['id'] ?>">Editar</a>
            <a class="delete" href="../includes/excluir.php?id=<?= $row['id'] ?>"
                onclick="return confirm('Tem certeza?')"
            >
                Excluir
            </a>
        </div>
    </div>
<?php endwhile; ?>
</body>
</html>
