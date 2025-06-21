<?php
// Inclui o cabeçalho padrão da aplicação (layout e menu)
require_once("cabecalho.php");

// Função para buscar os dados do veículo no banco de dados
function consultaVeiculo($placa)
{
    require("conexao.php"); // Faz a conexão com o banco
    try {
        // Prepara a consulta SQL para buscar o veículo pela placa
        $sql = "SELECT * FROM veiculo WHERE placa = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$placa]);

        // Retorna os dados como array associativo
        $veiculo = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se não encontrar o veículo, exibe erro e interrompe a execução
        if (!$veiculo) {
            die("Erro ao consultar o registro!");
        } else {
            return $veiculo;
        }
    } catch (Exception $e) {
        // Caso ocorra algum erro de conexão ou SQL, exibe a mensagem de erro
        die("Erro ao consultar veículo: " . $e->getMessage());
    }
}

// Função para alterar os dados do veículo no banco de dados
function alterarVeiculo($marca, $modelo, $ano, $placa)
{
    require("conexao.php"); // Faz a conexão com o banco
    try {
        // Prepara o comando SQL de atualização
        $sql = "UPDATE veiculo SET modelo = ?, marca = ?, ano = ? WHERE placa=?";
        $stmt = $pdo->prepare($sql);

        // Executa a atualização com os novos valores
        if ($stmt->execute([$modelo, $marca, $ano, $placa])) {
            // Se der certo, redireciona para a página de listagem com mensagem de sucesso
            header('location: veiculo.php?edicao=true');
        } else {
            // Se der errado, redireciona com mensagem de erro
            header('location: veiculo.php?edicao=false');
        }
    } catch (Exception $e) {
        // Em caso de erro, exibe a mensagem de exceção
        die("Erro ao alterar veículo: " . $e->getMessage());
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Captura os dados enviados pelo formulário
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];

    // Chama a função para alterar os dados do veículo
    alterarVeiculo($marca, $modelo, $ano, $placa);
} else {
    // Se for uma requisição GET, busca os dados do veículo para preencher o formulário
    $veiculo = consultaVeiculo($_GET['placa']);
}
?>

<!-- Título da página -->
<h2>Alterar Veículo</h2>

<!-- Formulário para alterar os dados -->
<form method="post">

    <!-- Campo oculto para enviar a placa (não pode ser alterada) -->
    <input type="hidden" name="placa" value="<?= $veiculo['placa'] ?>">

    <div class="mb-3">
        <label for="marca" class="form-label">Informe a marca</label>
        <!-- Campo de entrada para a marca, preenchido com o valor atual -->
        <input value="<?= $veiculo['marca'] ?>" type="text" id="marca" name="marca" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="modelo" class="form-label">Informe o modelo</label>
        <!-- Campo de entrada para o modelo, preenchido com o valor atual -->
        <input value="<?= $veiculo['modelo'] ?>" type="text" id="modelo" name="modelo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="ano" class="form-label">Informe o ano</label>
        <!-- Campo de entrada para o ano, preenchido com o valor atual -->
        <input value="<?= $veiculo['ano'] ?>" type="number" id="ano" name="ano" class="form-control" required>
    </div>

    <!-- Botão para enviar o formulário -->
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
// Inclui o rodapé padrão da aplicação
require_once("rodape.php");
?>