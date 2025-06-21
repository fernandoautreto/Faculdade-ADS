<?php
require_once("cabecalho.php"); // Inclui o cabeçalho padrão da página (layout e menu)

// Função para consultar um contrato pelo ID
function consultaContrato($idcontrato)
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Monta o SQL para buscar o contrato com base no idcontrato
        $sql = "SELECT * FROM contrato WHERE idcontrato = ?";
        $stmt = $pdo->prepare($sql); // Prepara a consulta para evitar SQL Injection
        $stmt->execute([$idcontrato]); // Executa a consulta passando o ID como parâmetro
        $contrato = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna o resultado como array associativo

        // Se o contrato não for encontrado, exibe uma mensagem de erro e interrompe o script
        if (!$contrato) {
            die("Contrato não encontrado!");
        } else {
            return $contrato; // Se encontrou, retorna os dados do contrato
        }
    } catch (Exception $e) {
        // Captura qualquer erro ocorrido durante a execução da consulta
        die("Erro ao consultar contrato: " . $e->getMessage());
    }
}

// Função para listar os tipos distintos de contrato
function listarTipos()
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Monta o SQL para listar apenas os tipos únicos de contrato
        $sql = "SELECT DISTINCT tipo FROM contrato";
        $stmt = $pdo->prepare($sql); // Prepara a consulta
        $stmt->execute(); // Executa a consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os tipos em formato de array associativo
    } catch (Exception $e) {
        // Em caso de erro, exibe mensagem e encerra o script
        die("Erro ao listar tipos: " . $e->getMessage());
    }
}

// Função para alterar os dados de um contrato
function alterarContrato($tipo, $valor, $idcontrato)
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Monta o SQL para atualizar o contrato com base no ID
        $sql = "UPDATE contrato SET tipo = ?, valor = ? WHERE idcontrato = ?";
        $stmt = $pdo->prepare($sql); // Prepara a consulta para evitar SQL Injection

        // Executa a atualização, passando os valores como parâmetros
        if ($stmt->execute([$tipo, $valor, $idcontrato])) {
            // Se der certo, redireciona para a listagem com mensagem de sucesso
            header('location: contratos.php?edicao=true');
        } else {
            // Se der erro, redireciona com mensagem de falha
            header('location: contratos.php?edicao=false');
        }
    } catch (Exception $e) {
        // Captura erro de execução e exibe
        die("Erro ao alterar contrato: " . $e->getMessage());
    }
}

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se o formulário foi enviado via POST, pega os dados do formulário
    $idcontrato = $_POST['idcontrato'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    // Chama a função para atualizar os dados no banco
    alterarContrato($tipo, $valor, $idcontrato);
} else {
    // Se for acesso via GET (primeiro carregamento da página)
    // Consulta os dados do contrato para preencher o formulário de edição
    $contrato = consultaContrato($_GET['idcontrato']);

    // Carrega os tipos de contrato para preencher o campo select
    $tipos = listarTipos();
}
?>

<h2>Editar Contrato</h2>

<!-- Formulário de edição do contrato -->
<form method="post">

    <!-- Campo oculto para enviar o ID do contrato -->
    <input type="hidden" name="idcontrato" value="<?= $contrato['idcontrato'] ?>">

    <!-- Campo de seleção para o tipo de contrato -->
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo de contrato</label>
        <select id="tipo" name="tipo" class="form-control" required>
            <?php foreach ($tipos as $t): ?>
                <!-- Define como selecionado o tipo atual do contrato -->
                <option value="<?= $t['tipo'] ?>" <?= $t['tipo'] == $contrato['tipo'] ? 'selected' : '' ?>>
                    <?= $t['tipo'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Campo para editar o valor do contrato -->
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input value="<?= $contrato['valor'] ?>" type="number" step="0.01" id="valor" name="valor" class="form-control"
            required>
    </div>

    <!-- Botão de envio -->
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php
require_once("rodape.php"); // Inclui o rodapé padrão da página
?>