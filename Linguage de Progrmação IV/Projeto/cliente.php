<?php
require_once("cabecalho.php"); // Inclui o cabeçalho da página (menu e layout)

// Função para buscar todos os clientes cadastrados no banco
function retornaCliente()
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Consulta SQL para buscar todos os clientes
        $sql = "SELECT * from cliente";
        $stmt = $pdo->query($sql); // Executa a consulta
        return $stmt->fetchAll();  // Retorna todos os resultados como array associativo
    } catch (Exception $e) {
        // Se ocorrer algum erro na consulta, exibe uma mensagem e interrompe a execução
        die("Erro ao consultar os clientes: " . $e->getMessage());
    }
}

// Chama a função e armazena os resultados no array $cliente
$cliente = retornaCliente();
?>

<h2>Clientes</h2>
<!-- Botão para cadastrar um novo cliente -->
<a href="cadastrar_cliente.php" class="btn btn-success mb-3">Novo Cliente</a>

<?php
// Verificação de mensagens de feedback via GET
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

<!-- Tabela com os dados dos clientes -->
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cliente as $cli): ?>
            <tr>
                <td><?= htmlspecialchars($cli['nome']) ?></td> <!-- Nome do cliente -->
                <td><?= htmlspecialchars($cli['cpf']) ?></td> <!-- CPF -->
                <td><?= htmlspecialchars($cli['rg']) ?></td> <!-- RG -->
                <td><?= htmlspecialchars($cli['telefone']) ?></td> <!-- Telefone -->
                <td>
                    <!-- Botões de ação: Editar e Consultar -->
                    <a href="editar_cliente.php?idcliente=<?= $cli['idcliente'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_cliente.php?idcliente=<?= $cli['idcliente'] ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once("rodape.php"); // Inclui o rodapé da página
?>
