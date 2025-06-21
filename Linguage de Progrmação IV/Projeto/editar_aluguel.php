<?php
// Inclui o cabeçalho da página (layout, menus, etc.)
require_once("cabecalho.php");

// Função para retornar todos os veículos cadastrados
function retornaVeiculo()
{
    require("conexao.php"); // Faz a conexão com o banco
    try {
        // Consulta todos os veículos, ordenados por marca, modelo e ano
        $sql = "SELECT * FROM veiculo ORDER BY marca, modelo, ano";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os resultados como array associativo
    } catch (Exception $e) {
        die("Erro ao consultar os veículos: " . $e->getMessage()); // Em caso de erro, exibe mensagem
    }
}

// Função para retornar todos os contratos cadastrados
function retornaContrato()
{
    require("conexao.php"); // Conexão com o banco
    try {
        // Consulta todos os contratos, ordenados por tipo
        $sql = "SELECT * FROM contrato ORDER BY tipo";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao consultar os contratos: " . $e->getMessage());
    }
}

// Função para buscar os dados de um aluguel específico pelo ID
function retornaAluguel($idaluguel)
{
    require("conexao.php");
    try {
        // Busca os dados do aluguel pelo idaluguel
        $sql = "SELECT * FROM aluguel WHERE idaluguel = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idaluguel]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna como array associativo
    } catch (Exception $e) {
        die("Erro ao consultar aluguel: " . $e->getMessage());
    }
}

// Função para alterar os dados de um aluguel
function alterarAluguel($idaluguel, $data_inicial, $data_final, $veiculo_placa, $contrato_idcontrato)
{
    require("conexao.php");
    try {
        // Atualiza os campos no banco de dados
        $sql = "UPDATE aluguel 
                SET data_inicial = ?, data_final = ?, veiculo_placa = ?, contrato_idcontrato = ?
                WHERE idaluguel = ?";
        $stmt = $pdo->prepare($sql);

        // Se a alteração for bem-sucedida, redireciona com sucesso
        if ($stmt->execute([$data_inicial, $data_final, $veiculo_placa, $contrato_idcontrato, $idaluguel]))
            header('location: aluguel.php?edicao=true');
        else
            header('location: aluguel.php?edicao=false');
    } catch (Exception $e) {
        die("Erro ao alterar aluguel: " . $e->getMessage());
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Captura os dados enviados via POST
    $idaluguel = $_POST['idaluguel'];
    $data_inicial = $_POST['data_inicial'];
    $veiculo_placa = $_POST['veiculo_placa'];
    $contrato_idcontrato = $_POST['contrato_idcontrato'];

    // Recupera o tipo do contrato para calcular a data final
    $contratos = retornaContrato();
    $tipo = '';
    foreach ($contratos as $c) {
        if ($c['idcontrato'] == $contrato_idcontrato) {
            $tipo = strtolower($c['tipo']);
            break;
        }
    }

    // Calcula a data final de acordo com o tipo do contrato
    $data_final = date_create($data_inicial);
    switch ($tipo) {
        case 'diario':
            $data_final->modify('+1 day');
            break;
        case 'semanal':
            $data_final->modify('+7 days');
            break;
        case 'mensal':
            $data_final->modify('+30 days');
            break;
        default:
            $data_final->modify('+1 day'); // Caso o tipo não seja reconhecido, padrão de 1 dia
    }

    // Formata a data final para o formato do banco (Y-m-d)
    $data_final_formatada = $data_final->format('Y-m-d');

    // Chama a função para alterar o aluguel
    alterarAluguel($idaluguel, $data_inicial, $data_final_formatada, $veiculo_placa, $contrato_idcontrato);
} else {
    // Se for GET, significa que o usuário está abrindo a tela de edição
    $idaluguel = $_GET['idaluguel'];
    $aluguel = retornaAluguel($idaluguel); // Busca os dados atuais do aluguel
}

// Busca as listas de veículos e contratos para preencher os campos do formulário
$veiculos = retornaVeiculo();
$contratos = retornaContrato();
?>

<h2>Alterar Aluguel</h2>

<!-- Formulário para edição de aluguel -->
<form method="post">
    <!-- Campo oculto com o ID do aluguel -->
    <input type="hidden" name="idaluguel" value="<?= htmlspecialchars($aluguel['idaluguel']) ?>">

    <!-- Campo para alterar a data inicial -->
    <div class="mb-3">
        <label for="data_inicial" class="form-label">Data Inicial</label>
        <input type="date" id="data_inicial" name="data_inicial" class="form-control" required
            value="<?= htmlspecialchars($aluguel['data_inicial']) ?>">
    </div>

    <!-- Campo para selecionar o veículo -->
    <div class="mb-3">
        <label for="veiculo_placa" class="form-label">Veículo (Marca - Modelo - Ano)</label>
        <select id="veiculo_placa" name="veiculo_placa" class="form-select" required>
            <option value="">Selecione o veículo</option>
            <?php foreach ($veiculos as $v): ?>
                <option value="<?= htmlspecialchars($v['placa']) ?>" <?= ($v['placa'] == $aluguel['veiculo_placa']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($v['marca'] . ' - ' . $v['modelo'] . ' - ' . $v['ano'] . ' (' . $v['placa'] . ')') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Campo para selecionar o tipo de contrato -->
    <div class="mb-3">
        <label for="contrato_idcontrato" class="form-label">Tipo de Contrato</label>
        <select id="contrato_idcontrato" name="contrato_idcontrato" class="form-select" required>
            <option value="">Selecione o contrato</option>
            <?php foreach ($contratos as $c): ?>
                <option value="<?= htmlspecialchars($c['idcontrato']) ?>"
                    <?= ($c['idcontrato'] == $aluguel['contrato_idcontrato']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['tipo']) ?> - R$ <?= htmlspecialchars($c['valor']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Botão de envio -->
    <button type="submit" class="btn btn-primary">Salvar Alteração</button>
</form>

<?php
// Inclui o rodapé da página
require_once("rodape.php");
?>