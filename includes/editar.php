
    <h2>Editar Contato</h2>
    <form action="../includes/editar.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label>
        <input type="email" name="email"><br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone"><br><br>

        <button type="submit">Salvar</button>
        <a href='../pages/main.php'>Voltar à lista</a>
    </form>


<?php
require_once '../includes/db_conection.php'


    $id = $_GET['id']; // Pega o ID 

    // Monta a querry
    $sql = "SELECT * FROM contatos WHERE id = $id";
    $result = $connect->query($sql); // Executa a query
    $dados = $result->fetch_assoc(); // Pega o resultado em forma de array 





// Verifica se o formulário foi enviado 
if ($_POST) {
    // Pega os dados enviados pelo formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Monta a query
    $sql = "UPDATE contatos 
            SET nome='$nome', email='$email', telefone='$telefone' 
            WHERE id = $id";

    // Executa a query, se tudo tiver ok
    if ($connect->query($sql) === TRUE) {
        echo "<p>Contato atualizado com sucesso!</p>";
        echo "<a href='listar.php'>Voltar à lista</a>";
    } else {

        echo "Erro: " . $connect->error;
    }

    // Fecha a conexão com o banco
    $connect->close();
}
?>