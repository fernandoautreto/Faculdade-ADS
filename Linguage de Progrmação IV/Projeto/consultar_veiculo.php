<?php
// Inclui o cabeçalho padrão do sistema (com menus, estilos etc.)
require_once("cabecalho.php");

// Função para consultar os dados de um veículo específico pela placa
function consultaVeiculo($placa)
{
    require("conexao.php"); // Inclui a conexão com o banco

    try {
        // Monta a SQL para buscar o veículo pela placa
        $sql = "SELECT * FROM veiculo WHERE placa = ?";
        $stmt = $pdo->prepare($sql); // Prepara a consulta
        $stmt->execute([$placa]);    // Executa passando o valor da placa

        $veiculo = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna o resultado como array associativo

        // Caso o veículo não seja encontrado
        if (!$veiculo) {
            die("Erro ao consultar o registro!");
        } else {
            return $veiculo; // Retorna os dados do veículo
        }
    } catch (Exception $e) {
        // Se ocorrer algum erro na execução da consulta
        die("Erro ao consultar veículo: " . $e->getMessage());
    }
}

// Função para excluir um veículo do banco de dados
function excluirVeiculo($placa)
{
    require("conexao.php"); // Inclui a conexão com o banco

    try {
        // Monta a SQL de exclusão
        $sql = "DELETE FROM veiculo WHERE placa=?";
        $stmt = $pdo->prepare($sql); // Prepara a exclusão

        // Tenta executar
        if ($stmt->execute([$placa])) {
            // Se a exclusão for bem-sucedida, redireciona com mensagem de sucesso
            header('location: veiculo.php?exclusao=true');
        } else {
            // Se der erro, redireciona com mensagem de erro
            header('location: veiculo.php?exclusao=false');
        }
    } catch (Exception $e) {
        // Caso aconteça alguma falha ao excluir
        die("Erro ao excluir o cliente: " . $e->getMessage());
    }
}

// Verifica se o formulário foi enviado (exclusão)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $placa = $_POST['placa'];     // Captura a placa enviada via POST
    excluirVeiculo($placa);       // Chama a função para excluir
} else {
    // Se não for POST, significa que o usuário apenas está consultando
    $veiculo = consultaVeiculo($_GET['placa']); // Busca o veículo pela placa passada via GET
}
?>

<h2>Consultar Veículo</h2>

<!-- Formulário de confirmação de exclusão -->
<form method="post">

    <!-- Campo oculto para enviar a placa via POST -->
    <input type="hidden" name="placa" value="<?= $veiculo['placa'] ?>"> 

    <!-- Exibe os dados do veículo -->
    <div class="mb-3">
        <p>Placa: <b> <?= $veiculo['placa'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p> Marca: <b> <?= $veiculo['marca'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p> Ano: <b> <?= $veiculo['ano'] ?> </b> </p>
    </div>

    <!-- Pergunta se o usuário deseja excluir -->
    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="veiculo.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>

<?php
// Inclui o rodapé padrão da página
require_once("rodape.php");
?>
