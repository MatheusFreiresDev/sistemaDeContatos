<?php 
// Importa o arquivo de conexão com o banco
require_once 'db_conection.php';


// verifica se o form foi lançado como POST
if($_POST) {

    // pega os valores no form
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


    // cria a consulta
   $sql = "INSERT INTO contatos (nome, email, telefone)
        VALUES ('$nome', '$email', '$telefone')";


    // aqui ele verifica se tem coneção, se tiver ele faz a querry
    if($connect->query($sql) === TRUE) {
        echo "<p>Contato cadastrado</p>";
        echo "<a href='../pages/main.php'><button type='button'>Voltar</button></a>";
    } else {
        echo "Erro: " . $sql . " " . $connect->connect_error;
    }

    //fecha a conexão.
    $connect->close();
}
?>
