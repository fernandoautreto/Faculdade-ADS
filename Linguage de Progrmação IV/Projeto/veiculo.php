<?php
// Inclui o cabeçalho da página (HTML + CSS + menu, etc.)
require_once("cabecalho.php");

// Função que retorna todos os veículos cadastrados no banco de dados
function retornaVeiculo()
{
    // Inclui o arquivo de conexão com o banco
    require("conexao.php");
    try {
        // Consulta SQL para buscar todos os registros da tabela 'veiculo'
        $sql = "SELECT * FROM veiculo";
        $stmt = $pdo->query($sql); // Executa a consulta diretamente
        return $stmt->fetchAll(); // Retorna todos os resultados como array associativo
    } catch (Exception $e) {
        // Em caso de erro na consulta, exibe a mensagem e encerra o script
        die("Erro ao consultar os veículos: " . $e->getMessage());
    }
}

// Executa a função e armazena o resultado na variável $veiculo
$veiculo = retornaVeiculo();
?>

<!-- Título da página -->
<h2>Veículos</h2>

<!-- Botão para adicionar um novo veículo -->
<a href="novo_veiculo.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
// Verifica se há mensagens de feedback na URL e exibe para o usuário
if (isset($_GET['cadastro']) && $_GET['cadastro'] == true) {
    echo '<p class="text-success">Registro salvo com sucesso!</p>';
} elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false) {
    echo '<p class="text-danger">Erro ao inserir o registro!</p>';
}
if (isset($_GET['edicao']) && $_GET['edicao'] == true) {
    echo '<p class="text-success">Registro alterado com sucesso!</p>';
} elseif (isset($_GET['edicao']) && $_GET['edicao'] == false) {
    echo '<p class="text-danger">Erro ao alterar o registro!</p>';
}
if (isset($_GET['exclusao']) && $_GET['exclusao'] == true) {
    echo '<p class="text-success">Registro excluído com sucesso!</p>';
} elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false) {
    echo '<p class="text-danger">Erro ao excluir o registro!</p>';
}
?>

<!-- Tabela com os veículos cadastrados -->
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop para exibir todos os veículos retornados -->
        <?php foreach ($veiculo as $v): ?>
            <tr>
                <td><?= htmlspecialchars($v['placa']) ?></td>
                <td><?= htmlspecialchars($v['marca']) ?></td>
                <td><?= htmlspecialchars($v['modelo']) ?></td>
                <td><?= htmlspecialchars($v['ano']) ?></td>
                <td>
                    <!-- Botões para editar e consultar o veículo -->
                    <a href="editar_veiculo.php?placa=<?= $v['placa'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_veiculo.php?placa=<?= $v['placa'] ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Inclui o rodapé da página
require_once("rodape.php");
?>