<?php
// Inicia a sessão para validar o acesso do usuário
session_start();

// Verifica se o usuário tem permissão para acessar
if (!$_SESSION['acesso']) {
    // Redireciona para a página de login com mensagem de acesso negado
    header("location: index.php?mensagem=acesso_negado");
    exit();
}

// Função que retorna todos os aluguéis com dados completos
function retornaAlugueis()
{
    require("conexao.php"); // Abre a conexão com o banco de dados
    try {
        // Consulta SQL que junta dados de aluguel, cliente, veículo e contrato
        $sql = "SELECT a.idaluguel,
                       c.nome AS nome_cliente, 
                       v.modelo AS modelo_veiculo, 
                       v.marca, 
                       v.ano, 
                       ct.tipo AS tipo_contrato, 
                       ct.valor AS valor_contrato
                FROM aluguel a
                INNER JOIN cliente c ON c.idcliente = a.cliente_idcliente
                INNER JOIN veiculo v ON v.placa = a.veiculo_placa
                INNER JOIN contrato ct ON ct.idcontrato = a.contrato_idcontrato";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(); // Retorna o resultado como array
    } catch (Exception $e) {
        // Em caso de erro, exibe a mensagem
        die("Erro ao consultar alugueis: " . $e->getMessage());
    }
}

// Executa a função e armazena o resultado
$aluguel = retornaAlugueis();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Aluguéis</title>
    <style>
        /* Estilo geral da página */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 20px;
        }

        /* Estilo para ocultar elementos na impressão */
        .no-print {
            display: block;
        }

        /* Estilo do botão de impressão */
        .print-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Regras para impressão */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                font-size: 12px;
                padding: 0;
            }

            .tabela th {
                background-color: #f0f0f0 !important;
                -webkit-print-color-adjust: exact;
                /* Garante cor do cabeçalho na impressão */
            }
        }

        /* Estilo do título */
        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Estilo da tabela */
        .tabela {
            width: 100%;
            border-collapse: collapse;
        }

        .tabela th,
        .tabela td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        .tabela th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>

    <!-- Botão para imprimir ou salvar como PDF -->
    <button class="print-button no-print" onclick="window.print()">Imprimir / Salvar como PDF</button>

    <!-- Título do Relatório -->
    <div class="titulo">Relatório de Aluguéis</div>

    <!-- Data Atual -->
    <div class="row">
        <div class="col">Data: <?php echo date('d/m/Y'); ?></div>
    </div>

    <!-- Tabela com os dados dos aluguéis -->
    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Tipo de Contrato</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aluguel as $a): ?>
                <tr>
                    <td><?= $a['idaluguel'] ?></td>
                    <td><?= $a['nome_cliente'] ?></td>
                    <td><?= $a['modelo_veiculo'] ?> - <?= $a['marca'] ?> (<?= $a['ano'] ?>)</td>
                    <td><?= $a['tipo_contrato'] ?></td>
                    <td>R$<?= number_format($a['valor_contrato'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>