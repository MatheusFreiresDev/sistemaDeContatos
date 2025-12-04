<?php

// Inclui o arquivo de conexão
require_once 'db_conection.php';

// Garante que o método seja POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Recebe os dados do formulário
    $usuario = $_POST['usuario'];
    $senha_digitada = $_POST['senha']; 

    $stmt = $connect->prepare("SELECT id, usuario, senha FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario); 
    $stmt->execute();
    $result = $stmt->get_result();

    // 3. Verifica se o usuário foi encontrado
    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();

        if ($senha_digitada === $user_data['senha']) { 
            
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['username'] = $user_data['usuario'];
    header("Location: ../pages/main.php");
            exit();
            
        } else {
            echo "❌ Senha incorreta. <a href='../pages/login.html'>Tente novamente</a>.";
        }
        
    } else {
        echo "❌ Usuário não encontrado. <a href='../pages/login.html'>Tente novamente</a>.";
    }

    $stmt->close();
    $connect->close();
}
?>
