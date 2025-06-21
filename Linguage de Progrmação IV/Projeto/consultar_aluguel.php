<?php
// Inclui o cabeçalho da página (menu, layout e estilos)
require_once("cabecalho.php");

// Função para consultar um aluguel específico no banco de dados
function consultaAluguel($veiculo_placa, $contrato_idcontrato, $cliente_idcliente)
{
    require("conexao.php"); // Inclui o arquivo de conexão com o banco

    try {
        // Monta a SQL para buscar os dados do aluguel junto com os dados do veículo
        $sql = "SELECT a.*, v.marca, v.modelo, v.ano
                FROM aluguel a
                JOIN veiculo v ON a.veiculo_placa = v.placa
                WHERE a.veiculo_placa = ? 
                  AND a.contrato_idcontrato = ? 
                  AND a.cliente_idcliente = ?";
        $stmt = $pdo->prepare($sql); // Prepara a consulta SQL
        $stmt->execute([$veiculo_placa, $contrato_idcontrato, $cliente_idcliente]); // Executa com os parâmetros recebidos
        $aluguel = $stmt->fetch(PDO::FETCH_ASSOC); // Captura o resultado como array associativo

        // Verifica se o aluguel foi encontrado
        if (!$aluguel) {
            die("Aluguel não encontrado."); // Se não encontrar, exibe mensagem de erro e encerra o programa
        }

        return $aluguel; // Retorna os dados do aluguel
    } catch (Exception $e) {
        die("Erro ao consultar aluguel: " . $e->getMessage()); // Captura e exibe erro caso ocorra
    }
}

// Função para excluir um aluguel específico
function excluirAluguel($veiculo_placa, $contrato_idcontrato, $cliente_idcliente)
{
    require("conexao.php"); // Faz a conexão com o banco

    try {
        // SQL para deletar o aluguel com base nos três campos-chave
        $sql = "DELETE FROM aluguel 
                WHERE veiculo_placa = ? 
                  AND contrato_idcontrato = ? 
                  AND cliente_idcliente = ?";
        $stmt = $pdo->prepare($sql); // Prepara a query

        // Tenta executar a exclusão
        if ($stmt->execute([$veiculo_placa, $contrato_idcontrato, $cliente_idcliente])) {
            // Se excluir com sucesso, redireciona para a listagem com mensagem de sucesso
            header('Location: aluguel.php?exclusao=true');
            exit();
        } else {
            // Se der erro, redireciona com mensagem de falha
            header('Location: aluguel.php?exclusao=false');
            exit();
        }
    } catch (Exception $e) {
        die("Erro ao excluir o aluguel: " . $e->getMessage()); // Em caso de erro, exibe mensagem
    }
}

// Controle de fluxo da página
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Se for POST, significa que o usuário confirmou a exclusão
    $veiculo_placa = $_POST['veiculo_placa'];
    $contrato_idcontrato = $_POST['contrato_idcontrato'];
    $cliente_idcliente = $_POST['cliente_idcliente'];

    excluirAluguel($veiculo_placa, $contrato_idcontrato, $cliente_idcliente); // Executa a exclusão
} else {
    // Se for GET, o sistema irá apenas consultar e exibir os dados do aluguel
    if (!isset($_GET['veiculo_placa'], $_GET['contrato_idcontrato'], $_GET['cliente_idcliente'])) {
        die("Dados de aluguel não informados."); // Se faltar algum dado, exibe erro
    }

    // Captura os dados recebidos via GET
    $veiculo_placa = $_GET['veiculo_placa'];
    $contrato_idcontrato = $_GET['contrato_idcontrato'];
    $cliente_idcliente = $_GET['cliente_idcliente'];

    // Consulta o aluguel no banco para exibir os dados
    $aluguel = consultaAluguel($veiculo_placa, $contrato_idcontrato, $cliente_idcliente);
}
?>

<h2>Consultar Aluguel</h2>

<!-- Formulário para confirmação de exclusão -->
<form method="post">
    <!-- Campos ocultos para enviar os dados corretos no POST -->
    <input type="hidden" name="veiculo_placa" value="<?= $aluguel['veiculo_placa'] ?>">
    <input type="hidden" name="contrato_idcontrato" value="<?= $aluguel['contrato_idcontrato'] ?>">
    <input type="hidden" name="cliente_idcliente" value="<?= $aluguel['cliente_idcliente'] ?>">

    <div class="mb-3">
        <p>Placa: <b><?= $aluguel['veiculo_placa'] ?></b></p>
    </div>
    <div class="mb-3">
        <p>Marca: <b><?= $aluguel['marca'] ?></b></p>
    </div>
    <div class="mb-3">
        <p>Modelo: <b><?= $aluguel['modelo'] ?></b></p>
    </div>
    <div class="mb-3">
        <p>Ano: <b><?= $aluguel['ano'] ?></b></p>
    </div>
    <div class="mb-3">
        <p>Data Inicial: <b><?= $aluguel['data_inicial'] ?></b></p>
    </div>
    <div class="mb-3">
        <p>Data Final: <b><?= $aluguel['data_final'] ?></b></p>
    </div>

    <!-- Pergunta de confirmação -->
    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="aluguel.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>

<?php
// Inclui o rodapé da página
require_once("rodape.php");
?>