<?php
require_once '../includes/db_conection.php';


// Verifica se foi passado um ID pela URL 
if (isset($_GET['id'])) {
    $id = $_GET['id']; // pega o id da URL
    $sql = "DELETE FROM contatos WHERE id = $id"; // monta a querry


    // se tiver tudo ok, ele executa a querry
    if ($connect->query($sql) === TRUE) {
        echo "<p>Contato excluído</p>";
        echo "<a href='../pages/main.php'>Voltar à lista</a>";
    } else {
        echo "Erro: " . $connect->error;
    }
}
?>
