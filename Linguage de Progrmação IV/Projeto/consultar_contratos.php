<?php
// Inclui o cabeçalho da página (layout padrão com menu, estilos etc.)
require_once("cabecalho.php");

// Função para consultar os dados de um contrato específico pelo ID
function consultaContrato($idcontrato)
{
    // Inclui a conexão com o banco de dados
    require("conexao.php");

    try {
        // Prepara o comando SQL para buscar o contrato com o ID fornecido
        $sql = "SELECT * FROM contrato WHERE idcontrato = ?";
        $stmt = $pdo->prepare($sql);

        // Executa a consulta passando o ID como parâmetro
        $stmt->execute([$idcontrato]);

        // Obtém o resultado da consulta em formato de array associativo
        $contrato = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o contrato foi encontrado
        if (!$contrato) {
            // Caso não encontre, exibe uma mensagem de erro e encerra o script
            die("Erro ao consultar o registro!");
        } else {
            // Se encontrou, retorna os dados do contrato
            return $contrato;
        }
    } catch (Exception $e) {
        // Em caso de erro na execução da query, exibe a mensagem de erro
        die("Erro ao consultar contrato: " . $e->getMessage());
    }
}

// Função para excluir um contrato com base no ID fornecido
function excluirContrato($idcontrato)
{
    // Inclui a conexão com o banco de dados
    require("conexao.php");

    try {
        // Prepara o comando SQL para excluir o contrato
        $sql = "DELETE FROM contrato WHERE idcontrato=?";
        $stmt = $pdo->prepare($sql);

        // Executa a exclusão passando o ID como parâmetro
        if ($stmt->execute([$idcontrato])) {
            // Se a exclusão for bem-sucedida, redireciona para a página de contratos com mensagem de sucesso
            header('location: contratos.php?exclusao=true');
        } else {
            // Se ocorrer erro, redireciona com mensagem de falha
            header('location: contratos.php?exclusao=false');
        }
    } catch (Exception $e) {
        // Em caso de erro na execução, exibe a mensagem de erro
        die("Erro ao excluir a categoria: " . $e->getMessage());
    }
}

// Verifica se o formulário foi enviado via POST (ou seja, se o usuário clicou em "Excluir")
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Captura o ID do contrato enviado pelo formulário
    $idcontrato = $_POST['idcontrato'];

    // Chama a função para excluir o contrato
    excluirContrato($idcontrato);
} else {
    // Se não for POST (ou seja, acesso inicial à página), realiza a consulta para exibir os dados do contrato
    $contrato = consultaContrato($_GET['idcontrato']);
}
?>
<!-- Título da página -->
<h2>Consultar Contrato</h2>

<!-- Formulário de confirmação para exclusão -->
<form method="post">
    <!-- Campo oculto para enviar o ID do contrato ao excluir -->
    <input type="hidden" name="idcontrato" value="<?= $contrato['idcontrato'] ?>">

    <!-- Exibe o tipo do contrato -->
    <div class="mb-3">
        <p>Tipo: <b> <?= $contrato['tipo'] ?> </b> </p>
    </div>

    <!-- Exibe o valor do contrato -->
    <div class="mb-3">
        <p>Valor: <b> <?= $contrato['valor'] ?> </b> </p>
    </div>

    <!-- Pergunta de confirmação e botões de ação -->
    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="contratos.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>

<?php
// Inclui o rodapé da página (layout de finalização)
require_once("rodape.php");
?>
