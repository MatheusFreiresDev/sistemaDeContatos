<?php
require_once '../includes/db_conection.php';

// Inicializa variáveis
$dados = [
    'id' => '',
    'nome' => '',
    'email' => '',
    'telefone' => ''
];

// ---------- POST: atualizar ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = intval($_POST['id']);
    $nome = $connect->real_escape_string($_POST['nome']);
    $email = $connect->real_escape_string($_POST['email']);
    $telefone = $connect->real_escape_string($_POST['telefone']);

    if ($id > 0) {
        $sql = "UPDATE contatos 
                SET nome='$nome', email='$email', telefone='$telefone' 
                WHERE id = $id";

        if ($connect->query($sql) === TRUE) {
            $msg_sucesso = "Contato atualizado com sucesso!";
        } else {
            $msg_erro = "Erro ao atualizar: " . $connect->error;
        }

        // recarregar dados
        $res = $connect->query("SELECT * FROM contatos WHERE id = $id");
        if ($res && $res->num_rows > 0) {
            $dados = $res->fetch_assoc();
        }
    }
}

// ---------- GET: carregar dados ----------
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die("ID inválido.");
    }

    $id = intval($_GET['id']);

    $sql = "SELECT * FROM contatos WHERE id = $id";
    $result = $connect->query($sql);

    if (!$result || $result->num_rows == 0) {
        die("Contato não encontrado.");
    }

    $dados = $result->fetch_assoc();
}

// helper para evitar XSS
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
</head>
<body>

<nav>
    <a href="../pages/main.php">Listar Contatos</a> |
    <a href="../pages/cadastro.html">Adicionar Contato</a> 
</nav>

<h2>Editar Contato</h2>

<?php if (!empty($msg_sucesso)): ?>
    <p><?php echo h($msg_sucesso); ?></p>
<?php endif; ?>

<?php if (!empty($msg_erro)): ?>
    <p><?php echo h($msg_erro); ?></p>
<?php endif; ?>

<form action="editar.php?id=<?php echo h($dados['id']); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo h($dados['id']); ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?php echo h($dados['nome']); ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo h($dados['email']); ?>"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?php echo h($dados['telefone']); ?>"><br><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>