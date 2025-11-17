<?php

require_once 'db_connect.php';

// pega o nome pela URL
$nome = $_GET['nome'] ?? '';
//cria a querry
$sql = "SELECT * FROM contatos WHERE nome LIKE '%$nome%'";
$result = $connect->query($sql); // executa
?>

