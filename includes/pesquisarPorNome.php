<?php

require_once '../includes/db_conection.php';

// pega o nome pela URL
$nome = $_GET['nome'] ?? '';
//cria a querry
$sql = "SELECT * FROM contatos WHERE nome LIKE '%$nome%'";
$result = $connect->query($sql); // executa



?>
<div class="topo">
    <h2>Lista de Contatos</h2>
    <form action="../includes/pesquisarPorNome.php">
    <input type="text" name="nome">
    </form>
    <a href="../pages/cadastro.html">
        <button class="botaoNovoContato" href>Novo Contato</button>
    </a>
</div>



<?php 
if ($result->num_rows === 0) {
echo"<br>";
echo"Nenhum Contato com esse Nome, Por favor Pesquisar Novamente.";
} else{
}

while($row = $result->fetch_assoc()): ?>
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
