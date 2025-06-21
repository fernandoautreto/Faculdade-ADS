<?php
// Inclui o cabeçalho padrão da aplicação (layout, menu, estilos)
require_once("cabecalho.php");

// Função para buscar todos os contratos cadastrados
function retornaContrato()
{
    require("conexao.php"); // Inclui a conexão com o banco
    try {
        // Consulta SQL para pegar todos os contratos
        $sql = "SELECT * FROM contrato";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(); // Retorna o resultado como array
    } catch (Exception $e) {
        // Em caso de erro na consulta
        die("Erro ao consultar o contrato: " . $e->getMessage());
    }
}

// Função para buscar todos os veículos disponíveis
function retornaVeiculo()
{
    require("conexao.php");
    try {
        $sql = "SELECT * FROM veiculo";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erro ao consultar o veículo: " . $e->getMessage());
    }
}

// Função para buscar todos os clientes cadastrados
function retornaCliente()
{
    require("conexao.php");
    try {
        $sql = "SELECT * FROM cliente";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erro ao consultar o cliente: " . $e->getMessage());
    }
}

// Função para buscar o ID do cliente pelo CPF
function retornaClientePorCPF($cpf)
{
    require("conexao.php");
    try {
        $sql = "SELECT idcliente FROM cliente WHERE cpf = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cpf]);
        return $stmt->fetchColumn(); // Retorna apenas o idcliente
    } catch (Exception $e) {
        die("Erro ao buscar cliente: " . $e->getMessage());
    }
}

// Função para inserir o aluguel no banco
function inserirAluguel($data_inicial, $data_final, $idcliente, $veiculo_placa, $contrato_id)
{
    require("conexao.php");
    try {
        $sql = "INSERT INTO aluguel (data_inicial, data_final, veiculo_placa, contrato_idcontrato, cliente_idcliente)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        // Se a inserção for bem-sucedida, redireciona com sucesso
        if ($stmt->execute([$data_inicial, $data_final, $veiculo_placa, $contrato_id, $idcliente])) {
            header('location: aluguel.php?cadastro=true');
        } else {
            header('location: aluguel.php?cadastro=false');
        }
    } catch (Exception $e) {
        die("Erro ao inserir aluguel: " . $e->getMessage());
    }
}

// Carrega os contratos, clientes e veículos para exibir no formulário
$contratos = retornaContrato();
$clientes = retornaCliente();
$veiculos = retornaVeiculo();

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados pelo formulário
    $data_inicial = $_POST['data_inicial'] ?? '';
    $contrato_id = $_POST['contrato_id'] ?? '';
    $cliente_cpf = $_POST['cliente_cpf'] ?? '';
    $veiculo_placa = $_POST['veiculo_placa'] ?? '';

    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($data_inicial) && !empty($cliente_cpf) && !empty($veiculo_placa) && !empty($contrato_id)) {
        $idcliente = retornaClientePorCPF($cliente_cpf); // Busca o ID do cliente pelo CPF

        if (!$idcliente) {
            die("Erro: Cliente não encontrado."); // Validação caso o cliente não exista
        }

        // Calcula a data final do aluguel com base no tipo de contrato
        $tipo = '';
        foreach ($contratos as $c) {
            if ($c['idcontrato'] == $contrato_id) {
                $tipo = $c['tipo'];
                break;
            }
        }

        $data_final = date_create($data_inicial); // Cria objeto de data baseado na data inicial
        switch (strtolower($tipo)) {
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
                $data_final->modify('+1 day'); // Caso o tipo seja desconhecido, assume diário
        }

        // Chama a função que insere o aluguel no banco
        inserirAluguel($data_inicial, date_format($data_final, "Y-m-d"), $idcliente, $veiculo_placa, $contrato_id);
    }
}
?>

<!-- Formulário HTML para cadastro de um novo aluguel -->
<main class="container mt-5">
    <h1>Alugar Veículo</h1>

    <form method="post">
        <!-- Campo para informar a data inicial do aluguel -->
        <div class="mb-3">
            <label for="data_inicial" class="form-label">Data Inicial:</label>
            <input type="date" id="data_inicial" name="data_inicial" class="form-control" required>
        </div>

        <!-- Campo de seleção do contrato -->
        <div class="mb-3">
            <label for="contratos" class="form-label">Contratos</label>
            <select id="contratos" name="contrato_id" class="form-select" required>
                <option value="" disabled selected>Selecione um contrato</option>
                <?php foreach ($contratos as $c): ?>
                    <option value="<?= $c['idcontrato'] ?>"><?= $c['tipo'] ?> - R$ <?= $c['valor'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Campo de seleção do cliente (busca por CPF) -->
        <div class="mb-3">
            <label for="cliente_cpf" class="form-label">Cliente</label>
            <select id="cliente_cpf" name="cliente_cpf" class="form-select" required>
                <option value="" disabled selected>Selecione um cliente</option>
                <?php foreach ($clientes as $cl): ?>
                    <option value="<?= $cl['cpf'] ?>"><?= $cl['nome'] ?> - <?= $cl['cpf'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Campo de seleção do veículo -->
        <div class="mb-3">
            <label for="veiculo_placa" class="form-label">Veículos</label>
            <select id="veiculo_placa" name="veiculo_placa" class="form-select" required>
                <option value="" disabled selected>Selecione um veículo</option>
                <?php foreach ($veiculos as $v): ?>
                    <option value="<?= $v['placa'] ?>"><?= $v['marca'] ?> - <?= $v['modelo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Botões para enviar ou voltar -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="button" onclick="history.back();" class="btn btn-secondary">Voltar</button>
        </div>
    </form>
</main>

<?php require_once("rodape.php"); // Inclui o rodapé padrão da aplicação ?>