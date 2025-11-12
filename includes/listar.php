<?php
require_once 'db_connect.php';

//monta a querry
$sql = "SELECT * FROM contatos";
//executa a querry
$result = $connect->query($sql);
?>