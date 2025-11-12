<?php
require_once 'db_connect.php';


// Verifica se foi passado um ID pela URL 
if (isset($_GET['id'])) {
    $id = $_GET['id']; // pega o id da URL
    $sql = "DELETE FROM contatos WHERE id = $id"; // monta a querry


    // se tiver tudo ok, ele executa a querry
    if ($connect->query($sql) === TRUE) {
        echo "<p>Contato excluído</p>";
    } else {
        echo "Erro: " . $connect->error;
    }
}
?>
