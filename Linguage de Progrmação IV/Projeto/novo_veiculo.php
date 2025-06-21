<?php
// Inclui o cabeçalho padrão da aplicação (menu, layout, etc.)
require_once("cabecalho.php");

// Inclui o arquivo de conexão com o banco de dados
require_once("conexao.php");

// Variável para controlar o tipo de alerta (sucesso ou erro)
$mensagem = null;

// Verifica se o formulário foi enviado (requisição POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados enviados pelo formulário
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $ano = $_POST["ano"];

    // Prepara o comando SQL para inserir os dados na tabela 'veiculo'
    $stmt = $pdo->prepare("INSERT INTO veiculo (placa, marca, modelo, ano) VALUES (?, ?, ?, ?)");

    // Executa o comando e verifica o resultado
    if ($stmt->execute([$placa, $marca, $modelo, $ano])) {
        $mensagem = "ok"; // Cadastro realizado com sucesso
    } else {
        $mensagem = "erro"; // Erro ao tentar cadastrar
    }
}
?>

<h2> Cadastrar Veículo </h2>

<!-- Formulário de cadastro de veículo -->
<form method="post">
    <div class="mb-3">
        <label for="placa" class="form-label">Placa:</label>
        <input type="text" id="placa" name="placa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca:</label>
        <input type="text" id="marca" name="marca" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo:</label>
        <input type="text" id="modelo" name="modelo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="ano" class="form-label">Ano:</label>
        <input type="number" id="ano" name="ano" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
</form>

<!-- Inclusão do SweetAlert para mensagens de alerta -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Verifica o resultado do cadastro e exibe o alerta correspondente -->
<?php if ($mensagem == "ok"): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cadastro realizado!',
            text: 'O veículo foi cadastrado com sucesso!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'principal.php'; // Redireciona após confirmação
            }
        });
    </script>
<?php elseif ($mensagem == "erro"): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Não foi possível cadastrar o veículo.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    </script>
<?php endif; ?>

<?php
// Inclui o rodapé padrão da aplicação
require_once("rodape.php");
?>
