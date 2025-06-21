<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AutoRent Express - Sistema de Controle de Estoque</title>

  <!-- Importa o Bootstrap para estilos visuais -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />

  <!-- Importa o CSS personalizado -->
  <link rel="stylesheet" href="estilos_login.css" />
</head>

<body>
  <div class="card card-login">
    <div class="logo">
      AutoRent Express
    </div>

    <h1>Login</h1>

    <?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once("conexao.php");

    // Verifica se o formulário foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      try {
        // Captura os dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Busca o usuário no banco de dados pelo email
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario["senha"])) {
          // Inicia a sessão e salva os dados do usuário
          session_start();
          $_SESSION['usuario'] = $usuario["nome"];
          $_SESSION['acesso'] = true;
          $_SESSION['email'] = $usuario['email'];

          // Redireciona para a página principal
          header('location: principal.php');
          exit;
        } else {
          // Caso email ou senha estejam incorretos
          $mensagem["erro"] = "Usuário e/ou senha incorretos!";
        }

      } catch (Exception $e) {
        // Trata erros de execução (ex.: problema no banco)
        echo "Erro: " . $e->getMessage();
        die();
      }
    }
    ?>

    <!-- Exibe a mensagem de erro caso o login falhe -->
    <?php if (isset($mensagem['erro'])): ?>
      <div class="alert alert-danger mt-3 mb-3">
        <?= $mensagem['erro'] ?>
      </div>
    <?php endif; ?>

    <!-- Exibe mensagem caso o acesso seja negado por falta de login -->
    <?php if ((isset($_GET['mensagem'])) && ($_GET['mensagem'] == "acesso_negado")): ?>
      <div class="alert alert-danger mt-3 mb-3">
        Você precisa informar seus dados de acesso para acessar o sistema!
      </div>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Informe o email:</label>
        <input type="email" id="email" name="email" class="form-control" required autofocus />
      </div>

      <div class="mb-4">
        <label for="senha" class="form-label">Informe a senha:</label>
        <input type="password" id="senha" name="senha" class="form-control" required />
      </div>

      <!-- Botão de envio -->
      <button type="submit" class="btn btn-primary w-100">Acessar</button>

      <!-- Link para cadastro de novo usuário -->
      <p class="text-center mt-3">
        Não possui acesso? Clique
        <a href="novo_usuario.php">aqui</a>
      </p>
    </form>
  </div>

  <!-- Importa o JavaScript do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>