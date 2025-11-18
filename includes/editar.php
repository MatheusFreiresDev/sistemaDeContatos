<?php
require_once '../includes/db_conection.php'; // importa conexão com o banco

// Inicializa variáveis
$dados = [
    'id' => '',
    'nome' => '',
    'email' => '',
    'telefone' => ''
]; // objeto padrão pra preencher o formulário

// ---------- POST: atualizar ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // se o form foi enviado

    $id = intval($_POST['id']); // pega o id como número
    $nome = $connect->real_escape_string($_POST['nome']); // escapa caracteres do nome
    $email = $connect->real_escape_string($_POST['email']); // escapa email
    $telefone = $connect->real_escape_string($_POST['telefone']); // escapa telefone

    if ($id > 0) { // só atualiza se tiver um id válido
        $sql = "UPDATE contatos 
                SET nome='$nome', email='$email', telefone='$telefone' 
                WHERE id = $id"; // query de update

        if ($connect->query($sql) === TRUE) { // verifica se atualizou
            $msg_sucesso = "Contato atualizado com sucesso!";
        } else {
            $msg_erro = "Erro ao atualizar: " . $connect->error; // erro caso falhe
        }

        // recarregar dados
        $res = $connect->query("SELECT * FROM contatos WHERE id = $id"); // busca o contato de novo
        if ($res && $res->num_rows > 0) { // se existir
            $dados = $res->fetch_assoc(); // joga no array
        }
    }
}

// ---------- GET: carregar dados ----------
if ($_SERVER['REQUEST_METHOD'] === 'GET') { // quando a página só abre
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { // valida id da URL
        die("ID inválido."); // encerra se estiver errado
    }

    $id = intval($_GET['id']); // pega id

    $sql = "SELECT * FROM contatos WHERE id = $id"; // busca o contato
    $result = $connect->query($sql);

    if (!$result || $result->num_rows == 0) { // caso não exista
        die("Contato não encontrado.");
    }

    $dados = $result->fetch_assoc(); // joga o contato no array
}

// helper para evitar XSS
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); // sanitiza saída
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <!-- charset padrão -->
    <title>Editar Contato</title> <!-- título da página -->
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- CSS -->
</head>
<body>

<nav>
    <a href="../pages/main.php">Listar Contatos</a> | <!-- link pra voltar -->
    <a href="../pages/cadastro.html">Adicionar Contato</a>  <!-- link pra cadastro -->
</nav>

<h2>Editar Contato</h2> <!-- título -->

<?php if (!empty($msg_sucesso)): ?>
    <p><?php echo h($msg_sucesso); ?></p> <!-- mensagem de sucesso -->
<?php endif; ?>

<?php if (!empty($msg_erro)): ?>
    <p><?php echo h($msg_erro); ?></p> <!-- mensagem de erro -->
<?php endif; ?>

<form action="editar.php?id=<?php echo h($dados['id']); ?>" method="POST"> <!-- form pra editar -->
    <input type="hidden" name="id" value="<?php echo h($dados['id']); ?>"> <!-- id escondido -->

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?php echo h($dados['nome']); ?>" required><br><br> <!-- campo nome -->

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo h($dados['email']); ?>"><br><br> <!-- campo email -->

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?php echo h($dados['telefone']); ?>"><br><br> <!-- campo telefone -->

    <button type="submit">Salvar</button> <!-- botão salvar -->
</form>

</body>
</html>
