<?php
require_once("cabecalho.php"); // Inclui o cabeçalho (layout e menu)

/* Função para consultar os dados de um cliente específico */
function consultaCliente($idcliente)
{
    require("conexao.php"); // Abre a conexão com o banco
    try {
        $sql = "SELECT * FROM cliente WHERE idcliente = ?"; // Consulta filtrando por idcliente
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idcliente]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna o resultado como array associativo
        if (!$cliente) {
            die("Erro ao consultar o registro!"); // Caso não encontre o cliente
        } else {
            return $cliente; // Retorna os dados encontrados
        }
    } catch (Exception $e) {
        die("Erro ao consultar cliente: " . $e->getMessage()); // Tratamento de exceção
    }
}

/* Função para excluir o cliente */
function excluirCliente($idcliente)
{
    require("conexao.php"); // Abre a conexão com o banco
    try {
        $sql = "DELETE FROM cliente WHERE idcliente=?"; // Comando para deletar o cliente
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$idcliente])) {
            header('location: cliente.php?exclusao=true'); // Redireciona em caso de sucesso
        } else {
            header('location: cliente.php?exclusao=false'); // Redireciona em caso de falha
        }
    } catch (Exception $e) {
        die("Erro ao excluir o cliente: " . $e->getMessage()); // Tratamento de erro
    }
}

// Verificando o tipo de requisição
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Se for POST, significa que o usuário clicou em excluir
    $idcliente = $_POST['idcliente'];
    excluirCliente($idcliente);
} else {
    // Se for GET, significa que o usuário só quer consultar
    $cliente = consultaCliente($_GET['idcliente']);
}
?>

<h2>Consultar Cliente</h2>

<form method="post">
    <input type="hidden" name="idcliente" value="<?= $cliente['idcliente'] ?>">

    <div class="mb-3">
        <p>Nome: <b><?= $cliente['nome'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>CPF: <b><?= $cliente['cpf'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>RG: <b><?= $cliente['rg'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>Telefone: <b><?= $cliente['telefone'] ?></b></p>
    </div>

    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="cliente.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>

<?php
require_once("rodape.php"); // Inclui o rodapé padrão
?>