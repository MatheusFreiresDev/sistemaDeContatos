<?php
// Importa o arquivo de conexão com o banco de dados
require_once 'db_connect.php';



// Verifica se foi passado um ID pela URL (GET) para editar um contato existente
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Pega o ID do contato enviado pela URL

    // Monta a querry
    $sql = "SELECT * FROM contatos WHERE id = $id";
    $result = $connect->query($sql); // Executa a query
    $dados = $result->fetch_assoc(); // Pega o resultado em forma de array 
}




// Verifica se o formulário foi enviado (POST)
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

    // Executa a query se tudo tiver ok
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
