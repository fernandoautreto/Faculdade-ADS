<?php
// Inclui o cabeçalho padrão da aplicação (menu, layout, configurações visuais)
require_once("cabecalho.php");
require_once("conexao.php");

// Variável para armazenar a mensagem de retorno (sucesso ou erro)
$mensagem = null;

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $telefone = $_POST["telefone"];

    // Prepara o comando SQL para inserir o novo cliente
    $stmt = $pdo->prepare("INSERT INTO cliente (nome, cpf, rg, telefone) VALUES (?, ?, ?, ?)");

    // Executa o comando e verifica se deu certo
    if ($stmt->execute([$nome, $cpf, $rg, $telefone])) {
        $mensagem = "ok";
    } else {
        $mensagem = "erro";
    }
}
?>

<h2>Novo Cliente</h2>

<!-- Formulário de cadastro de cliente -->
<form method="post">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" id="cpf" name="cpf" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="rg" class="form-label">RG:</label>
        <input type="text" id="rg" name="rg" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
</form>

<!-- Inclusão da biblioteca SweetAlert para mensagens de alerta -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Exibição da mensagem de sucesso ou erro -->
<?php if ($mensagem == "ok"): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cadastro realizado!',
            text: 'O cliente foi cadastrado com sucesso!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'principal.php';
            }
        });
    </script>
<?php elseif ($mensagem == "erro"): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Não foi possível cadastrar o cliente.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    </script>
<?php endif; ?>

<?php
// Inclui o rodapé padrão da aplicação
require_once("rodape.php");
?>
