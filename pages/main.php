<?php
require_once '../includes/protecao_login.php'; // proteção do login
require_once '../includes/db_conection.php'; // importa o arquivo de conexão com o banco

// Puxa todos contatos
$sql = "SELECT * FROM contatos ORDER BY id DESC"; // consulta pra pegar todos os contatos ordenados do mais recente
$result = $connect->query($sql); // executa a query no banco
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- define o padrão de caracteres -->
    <title>Contatos</title> <!-- título da página -->
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- link do CSS -->
</head>
<body>

<div class="topo">
    <h2>Lista de Contatos</h2> <!-- título grande da página -->

    <form action="../includes/pesquisarPorNome.php"> <!-- formulário de pesquisa -->
        <input type="text" name="nome"> <!-- campo de busca por nome -->
    </form>

    <a href="cadastro.html"> <!-- botão pra ir pro cadastro -->
        <button class="botaoNovoContato">Novo Contato</button>
    </a>
</div>

<?php 
if ($result->num_rows === 0) { // verifica se não tem nenhum contato
    echo"<br>";
    echo "<div style='margin-left: 31em;'>Nenhum Contato Cadastrado.</div>"; // mensagem caso esteja vazio
} else{
    // se tiver contato, não faz nada aqui
}

while($row = $result->fetch_assoc()): ?> <!-- loop pra mostrar cada contato -->
    <div class="card"> <!-- card individual -->
        <b><?= $row['nome'] ?></b><br> <!-- nome do contato -->
        Email: <?= $row['email'] ?><br> <!-- email do contato -->
        Tel: <?= $row['telefone'] ?><br> <!-- telefone do contato -->

        <div class="botoes"> <!-- div dos botões -->
            <a href="../includes/editar.php?id=<?= $row['id'] ?>">Editar</a> <!-- botão pra editar -->
            <a class="delete" href="../includes/excluir.php?id=<?= $row['id'] ?>" 
                onclick="return confirm('Tem certeza?')"
            >
                Excluir
            </a>
        </div>
    </div>
<?php endwhile; ?> <!-- fim do while -->
</body>
</html>
