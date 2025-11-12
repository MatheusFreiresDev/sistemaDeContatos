<?php
$host = "localhost";
$usuario = "contatos_user";
$senha = "senha123";
$banco = "contatos_db";

//  conexão
$connect = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($connect->connect_error) {
    die("Falha na conexão: " . $connect->connect_error);
}


$connect->set_charset("utf8");

?>
