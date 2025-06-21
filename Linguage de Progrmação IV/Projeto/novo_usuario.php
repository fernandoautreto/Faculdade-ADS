<?php
// Inclui o arquivo de conexão com o banco de dados
require_once("conexao.php");

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Captura os dados enviados pelo formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        // Criptografa a senha usando o algoritmo BCRYPT
        $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

        // Prepara a consulta SQL para inserir um novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)");

        // Executa a consulta passando os valores do formulário
        if ($stmt->execute([$nome, $email, $senha])) {
            // Se a inserção for bem-sucedida, redireciona o usuário para a página de login com mensagem de sucesso
            header("location: index.php?cadastro=true");
        } else {
            // Caso dê erro na execução da query
            echo "<p>Erro ao inserir o usuário</p>";
        }

    } catch (Exception $e) {
        // Caso ocorra alguma exceção (erro), exibe a mensagem
        echo "Erro ao inserir usuário: " . $e->getMessage();
    }
}
?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Usuário</title>

    <!-- Importa o CSS do Bootstrap para o layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <h1>Novo Usuário</h1>

        <!-- Formulário para criar novo usuário -->
        <form method="post">
            
            <!-- Campo Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Informe o nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required="">
            </div>
            
            <!-- Campo Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Informe o email:</label>
                <input type="email" id="email" name="email" class="form-control" required="">
            </div>
            
            <!-- Campo Senha -->
            <div class="mb-3">
                <label for="senha" class="form-label">Informe a senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required="">
            </div>
            
            <!-- Botão de envio do formulário -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>

    <!-- Importa o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
