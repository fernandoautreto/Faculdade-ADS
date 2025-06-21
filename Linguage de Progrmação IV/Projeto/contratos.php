<?php
// Inclui o cabeçalho padrão da aplicação (menu, layout, etc.)
require_once("cabecalho.php");

// Função responsável por buscar os contratos no banco de dados
function retornaContrato()
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Consulta todos os contratos, ordenados pelo tipo
        $sql = "SELECT * FROM contrato ORDER BY tipo";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(); // Retorna o resultado como um array
    } catch (Exception $e) {
        // Em caso de erro, mostra a mensagem
        die("Erro ao consultar os contratos: " . $e->getMessage());
    }
}

// Executa a função e guarda os contratos encontrados
$contrato = retornaContrato();
?>

<h2>Contratos</h2>

<!-- Botão para cadastrar um novo contrato -->
<a href="cadastrar_contrato.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
// Verifica se existem mensagens de feedback na URL (GET)
// Mensagem de sucesso ou erro ao cadastrar
if (isset($_GET['cadastro']) && $_GET['cadastro'] == true) {
    echo '<p class="text-success">Registro salvo com sucesso!</p>';
} elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false) {
    echo '<p class="text-danger">Erro ao inserir o registro!</p>';
}

// Mensagem de sucesso ou erro ao editar
if (isset($_GET['edicao']) && $_GET['edicao'] == true) {
    echo '<p class="text-success">Registro alterado com sucesso!</p>';
} elseif (isset($_GET['edicao']) && $_GET['edicao'] == false) {
    echo '<p class="text-danger">Erro ao alterar o registro!</p>';
}

// Mensagem de sucesso ou erro ao excluir
if (isset($_GET['exclusao']) && $_GET['exclusao'] == true) {
    echo '<p class="text-success">Registro excluído com sucesso!</p>';
} elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false) {
    echo '<p class="text-danger">Erro ao excluir o registro!</p>';
}
?>

<!-- Tabela para exibir os contratos -->
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contrato as $c): ?>
            <tr>
                <!-- Exibe os dados de forma segura contra XSS -->
                <td><?= htmlspecialchars($c['tipo']) ?></td>
                <td><?= htmlspecialchars($c['valor']) ?></td>
                <td>
                    <!-- Botão para editar o contrato -->
                    <a href="editar_contrato.php?idcontrato=<?= $c['idcontrato'] ?>" class="btn btn-warning">Editar</a>
                    <!-- Botão para consultar detalhes do contrato -->
                    <a href="consultar_contratos.php?idcontrato=<?= $c['idcontrato'] ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Inclui o rodapé padrão da aplicação
require_once("rodape.php");
?>