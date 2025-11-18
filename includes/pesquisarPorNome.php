<?php

require_once '../includes/db_conection.php'; // importa conexão com o banco

// pega o nome pela URL
$nome = $_GET['nome'] ?? ''; // pega o valor do campo 'nome' ou deixa vazio se não vier nada

//cria a querry
$sql = "SELECT * FROM contatos WHERE nome LIKE '%$nome%'"; // busca contatos que contenham o nome digitado
$result = $connect->query($sql); // executa a query

?>

<div class="topo">
    <h2>Lista de Contatos</h2> <!-- título da página -->
    <form action="../includes/pesquisarPorNome.php"> <!-- formulário de pesquisa -->
        <input type="text" name="nome"> <!-- campo para digitar o nome a pesquisar -->
    </form>
    <a href="../pages/cadastro.html"> <!-- link para cadastro -->
        <button class="botaoNovoContato" href>Novo Contato</button> <!-- botão de novo contato -->
    </a>
</div>

<link rel="stylesheet" href="../assets/css/style.css"> <!-- importação do CSS -->

<?php 

if ($result->num_rows === 0) { // caso nenhum registro seja encontrado

    echo"<br>";
    echo "<div style='margin-left: 23em;'>Nenhum Contato com esse Nome, Por favor Pesquisar Novamente.</div>"; // mensagem de erro

} else{
    // se tiver contato, não faz nada aqui
}

while($row = $result->fetch_assoc()): ?> <!-- loop para mostrar os resultados -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"> <!-- configuração padrão de charset -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- responsividade -->
        <title>Document</title> <!-- título da página -->
        <link rel="stylesheet" href="../assets/css/style.css"> <!-- CSS novamente -->
    </head>
    <body>
     <div class="card"> <!-- card do contato -->
        <b><?= $row['nome'] ?></b><br> <!-- nome -->
        Email: <?= $row['email'] ?><br> <!-- email -->
        Tel: <?= $row['telefone'] ?><br> <!-- telefone -->

        <div class="botoes"> <!-- botões de ação -->
            <a href="../includes/editar.php?id=<?= $row['id'] ?>">Editar</a> <!-- botão editar -->
            <a class="delete" href="../includes/excluir.php?id=<?= $row['id'] ?>"
                onclick="return confirm('Tem certeza?')"
            >
                Excluir
            </a>
        </div>
    </div>     
    </body>
    </html>
   
<?php endwhile; ?> <!-- fim do while -->
