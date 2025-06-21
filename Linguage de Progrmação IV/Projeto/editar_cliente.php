<?php

// Inclui o cabeçalho padrão da aplicação (menu, layout e configurações)
require_once("cabecalho.php");

// Função que consulta os dados de um cliente específico, pelo id
function consultaCliente($idcliente)
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Consulta SQL para buscar o cliente com base no idcliente
        $sql = "SELECT * FROM cliente WHERE idcliente = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idcliente]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o cliente não for encontrado, exibe erro e encerra
        if (!$cliente) {
            die("Erro ao consultar o registro!");
        } else {
            return $cliente; // Retorna os dados do cliente como array associativo
        }
    } catch (Exception $e) {
        // Captura e exibe qualquer erro que acontecer durante a consulta
        die("Erro ao consultar cliente: " . $e->getMessage());
    }
}

// Função que realiza a alteração dos dados de um cliente
function alterarCliente($nome, $cpf, $rg, $telefone, $idcliente)
{
    require("conexao.php"); // Faz a conexão com o banco de dados
    try {
        // Comando SQL para atualizar os dados do cliente
        $sql = "UPDATE cliente SET nome = ?, cpf = ?, rg = ?, telefone = ? WHERE idcliente=?";
        $stmt = $pdo->prepare($sql);

        // Executa a atualização e redireciona informando o resultado na URL
        if ($stmt->execute([$nome, $cpf, $rg, $telefone, $idcliente])) {
            header('location: cliente.php?edicao=true');
        } else {
            header('location: cliente.php?edicao=false');
        }
    } catch (Exception $e) {
        // Captura e exibe erro caso ocorra na atualização
        die("Erro ao alterar o cliente: " . $e->getMessage());
    }
}

// Verifica se a página foi acessada via POST (formulário enviado)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Recebe os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $telefone = $_POST['telefone'];
    $idcliente = $_POST['idcliente'];

    // Chama a função para alterar o cliente no banco de dados
    alterarCliente($nome, $cpf, $rg, $telefone, $idcliente);
} else {
    // Se for GET, carrega os dados atuais do cliente para preencher o formulário
    $cliente = consultaCliente($_GET['idcliente']);
}

?>

<h2>Alterar Cliente</h2>

<!-- Formulário HTML para edição dos dados do cliente -->
<form method="post">

    <!-- Campo oculto para manter o id do cliente -->
    <input type="hidden" name="idcliente" value="<?= $cliente['idcliente'] ?>">

    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome</label>
        <input value="<?= htmlspecialchars($cliente['nome']) ?>" type="text" id="nome" name="nome" class="form-control"
            required="">
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">Informe o CPF</label>
        <input value="<?= htmlspecialchars($cliente['cpf']) ?>" type="text" id="cpf" name="cpf" class="form-control"
            required="">
    </div>

    <div class="mb-3">
        <label for="rg" class="form-label">Informe o RG</label>
        <input value="<?= htmlspecialchars($cliente['rg']) ?>" type="text" id="rg" name="rg" class="form-control"
            required="">
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o Telefone</label>
        <input value="<?= htmlspecialchars($cliente['telefone']) ?>" type="text" id="telefone" name="telefone"
            class="form-control" required="">
    </div>

    <!-- Botão de envio -->
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

<?php
// Inclui o rodapé padrão da aplicação
require_once("rodape.php");
?>