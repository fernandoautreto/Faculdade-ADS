<?php
// Inclui o arquivo do cabeçalho da página, que contém o layout e o menu padrão da aplicação
require_once("cabecalho.php");

// Função que retorna todos os aluguéis cadastrados no banco de dados
function retornaAlugueis()
{
    // Inclui o arquivo de conexão com o banco de dados
    require("conexao.php");
    try {
        // Consulta SQL que traz dados dos aluguéis, clientes, veículos e contratos,
        // usando INNER JOIN para relacionar as tabelas e obter informações completas
        $sql = "SELECT a.idaluguel, a.data_inicial, a.data_final, a.veiculo_placa, a.contrato_idcontrato, a.cliente_idcliente,
                       c.nome AS nome_cliente, c.cpf AS cliente_cpf, 
                       v.modelo AS modelo_veiculo, v.marca, v.ano, 
                       ct.tipo AS tipo, ct.valor AS valor_contrato
                FROM aluguel a
                INNER JOIN cliente c ON c.idcliente = a.cliente_idcliente
                INNER JOIN veiculo v ON v.placa = a.veiculo_placa
                INNER JOIN contrato ct ON ct.idcontrato = a.contrato_idcontrato";
        
        // Executa a consulta no banco
        $stmt = $pdo->query($sql);

        // Retorna os resultados como um array associativo para uso na página
        return $stmt->fetchAll();
    } catch (Exception $e) {
        // Caso ocorra erro na consulta, exibe a mensagem e interrompe a execução
        die("Erro ao consultar alugueis: " . $e->getMessage());
    }
}

// Chama a função para obter os dados dos aluguéis e guarda na variável $aluguel
$aluguel = retornaAlugueis();
?>

<!-- Título da página -->
<h2>Lista de Aluguéis</h2>

<!-- Botão que leva para a página de cadastro de um novo aluguel -->
<a href="novo_aluguel.php" class="btn btn-success mb-3">Novo Aluguel</a>

<?php
// Exibição de mensagens de feedback para o usuário, baseadas em parâmetros passados via URL (GET)

// Mensagem após tentativa de cadastro
if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'true') {
    echo '<p class="text-success">Registro salvo com sucesso!</p>';
} elseif (isset($_GET['cadastro']) && $_GET['cadastro'] === 'false') {
    echo '<p class="text-danger">Erro ao inserir o registro!</p>';
}

// Mensagem após tentativa de edição
if (isset($_GET['edicao']) && $_GET['edicao'] === 'true') {
    echo '<p class="text-success">Registro alterado com sucesso!</p>';
} elseif (isset($_GET['edicao']) && $_GET['edicao'] === 'false') {
    echo '<p class="text-danger">Erro ao alterar o registro!</p>';
}

// Mensagem após tentativa de exclusão
if (isset($_GET['exclusao']) && $_GET['exclusao'] === 'true') {
    echo '<p class="text-success">Registro excluído com sucesso!</p>';
} elseif (isset($_GET['exclusao']) && $_GET['exclusao'] === 'false') {
    echo '<p class="text-danger">Erro ao excluir o registro!</p>';
}
?>

<!-- Tabela para exibir a lista de aluguéis -->
<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>Nome do Cliente</th>
            <th>CPF</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Ano</th>
            <th>Tipo</th>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <!-- Laço que percorre todos os aluguéis e cria uma linha na tabela para cada um -->
        <?php foreach ($aluguel as $a): ?>
            <tr>
                <!-- Exibição dos dados com htmlspecialchars para evitar ataques XSS -->
                <td><?= htmlspecialchars($a['nome_cliente']) ?></td>
                <td><?= htmlspecialchars($a['cliente_cpf']) ?></td>
                <td><?= htmlspecialchars($a['modelo_veiculo']) ?></td>
                <td><?= htmlspecialchars($a['marca']) ?></td>
                <td><?= htmlspecialchars($a['ano']) ?></td>
                <td><?= htmlspecialchars($a['tipo']) ?></td>
                <td><?= htmlspecialchars($a['data_inicial']) ?></td>
                <td><?= htmlspecialchars($a['data_final']) ?></td>
                <!-- Formatação do valor para o formato monetário brasileiro -->
                <td><?= 'R$ ' . number_format($a['valor_contrato'], 2, ',', '.') ?></td>
                <td>
                    <!-- Botão para editar o aluguel, passando o id do aluguel via URL -->
                    <a href="editar_aluguel.php?idaluguel=<?= $a['idaluguel'] ?>" class="btn btn-warning">Editar</a>
                    
                    <!-- Botão para consultar detalhes do aluguel, passando placa do veículo, id do contrato e do cliente -->
                    <a href="consultar_aluguel.php?veiculo_placa=<?= urlencode($a['veiculo_placa']) ?>&contrato_idcontrato=<?= urlencode($a['contrato_idcontrato']) ?>&cliente_idcliente=<?= urlencode($a['cliente_idcliente']) ?>" 
                       class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Inclui o rodapé padrão da página
require_once("rodape.php");
?>
