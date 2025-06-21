<?php
// Inclui o cabeçalho da página (layout, menus, etc.)
require_once("cabecalho.php");

// Inclui o arquivo de conexão com o banco de dados
require_once("conexao.php");

// Variável de controle para indicar o resultado do cadastro (sucesso ou erro)
$mensagem = null;

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados enviados pelo formulário
    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];

    // Prepara o comando SQL para inserir os dados na tabela "contrato"
    $stmt = $pdo->prepare("INSERT INTO contrato(tipo, valor) VALUES (?, ?)");

    // Executa o comando SQL passando os valores capturados
    if ($stmt->execute([$tipo, $valor])) {
        // Se a execução for bem-sucedida, define a mensagem como "ok"
        $mensagem = "ok";
    } else {
        // Se ocorrer algum erro, define a mensagem como "erro"
        $mensagem = "erro";
    }
}
?>

<!-- Título da página -->
<h2> Cadastrar Contrato </h2>

<!-- Formulário para cadastro de contrato -->
<form method="post">
    <!-- Campo para selecionar o tipo do contrato -->
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select id="tipo" name="tipo" class="form-select" required>
            <option value="diário">Diário</option>
            <option value="semanal">Semanal</option>
            <option value="mensal">Mensal</option>
        </select>
    </div>

    <!-- Campo para inserir o valor do contrato -->
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" id="valor" name="valor" class="form-control" required>
    </div>

    <!-- Botão para enviar o formulário -->
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<!-- Importação do SweetAlert (plugin de alerta visual) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Exibição das mensagens de sucesso ou erro -->
<?php if ($mensagem == "ok"): ?>
    <script>
    // Alerta de sucesso usando SweetAlert
    Swal.fire({
        icon: 'success',
        title: 'Cadastro realizado!',
        text: 'O contrato foi cadastrado com sucesso!',
        confirmButtonText: 'OK',
        confirmButtonColor: '#3085d6'
    }).then((result) => {
        // Após o usuário clicar em OK, redireciona para a página principal
        if (result.isConfirmed) {
            window.location.href = 'principal.php';
        }
    });
    </script>
<?php elseif ($mensagem == "erro"): ?>
    <script>
    // Alerta de erro usando SweetAlert
    Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: 'Não foi possível cadastrar o contrato.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#d33'
    });
    </script>
<?php endif; ?>

<?php
// Inclui o rodapé da página (layout de finalização)
require_once("rodape.php");
?>
