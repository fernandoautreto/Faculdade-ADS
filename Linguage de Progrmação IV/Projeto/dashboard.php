<?php
// Inclui o cabeçalho da aplicação (menu, layout etc)
require_once('cabecalho.php');

// Função para consultar o valor total dos contratos por modelo de veículo
function retornaValoresContratos()
{
    require("conexao.php"); // Abre a conexão com o banco
    try {
        // SQL que soma o valor total dos contratos agrupados por modelo de veículo
        $sql = "SELECT v.modelo AS modelo_veiculo, 
                       SUM(ct.valor) AS valor_total
                FROM aluguel a
                INNER JOIN cliente c ON c.idcliente = a.cliente_idcliente
                INNER JOIN veiculo v ON v.placa = a.veiculo_placa
                INNER JOIN contrato ct ON ct.idcontrato = a.contrato_idcontrato
                GROUP BY v.modelo";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(); // Retorna os resultados como array
    } catch (Exception $e) {
        die("Erro ao consultar valores dos contratos: " . $e->getMessage());
    }
}

// Função para consultar a quantidade de aluguéis por modelo de veículo
function retornaQuantidadeAlugueis()
{
    require("conexao.php");
    try {
        // SQL que conta quantos aluguéis tem por modelo de veículo
        $sql = "SELECT v.modelo AS modelo_veiculo, 
                       COUNT(*) AS quantidade
                FROM aluguel a
                INNER JOIN veiculo v ON v.placa = a.veiculo_placa
                GROUP BY v.modelo";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erro ao consultar quantidade de alugueis: " . $e->getMessage());
    }
}

// Função para consultar a quantidade de aluguéis por tipo de contrato
function retornaPorcentagemContratos()
{
    require("conexao.php");
    try {
        // SQL que conta a quantidade de aluguéis por tipo de contrato
        $sql = "SELECT ct.tipo AS tipo_contrato, COUNT(*) AS quantidade
                FROM aluguel a
                INNER JOIN contrato ct ON ct.idcontrato = a.contrato_idcontrato
                GROUP BY ct.tipo";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erro ao consultar tipos de contrato: " . $e->getMessage());
    }
}

// Executa as funções para buscar os dados que serão usados nos gráficos
$valores = retornaValoresContratos();
$quantidades = retornaQuantidadeAlugueis();
$tiposContrato = retornaPorcentagemContratos();
?>

<h1>Dashboard de Aluguéis</h1>

<!-- Link para o relatório em PDF (arquivo relatorio.php) -->
<a href="relatorio.php" target="_blank">Relatório de Aluguéis</a>

<!-- Carregamento da biblioteca Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Estilos para os gráficos -->
<style>
    .grafico {
        margin-bottom: 50px;
    }

    h2 {
        margin-top: 40px;
    }
</style>

<!-- Área dos Gráficos -->
<h2>Valor Total dos Contratos por Modelo</h2>
<div id="chart_valores" class="grafico"></div>
<hr>

<h2>Quantidade de Aluguéis por Modelo</h2>
<div id="chart_quantidades" class="grafico"></div>
<hr>

<h2>Distribuição dos Tipos de Contrato (%)</h2>
<div id="chart_pizza" class="grafico"></div>

<script>
    // Carrega os pacotes de gráficos
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawGraficos);

    function drawGraficos() {
        // Gráfico 1: Valor total por modelo
        var dataValores = google.visualization.arrayToDataTable([
            ['Modelo', 'Valor Total (R$)'],
            <?php
            foreach ($valores as $v) {
                $modelo = $v['modelo_veiculo'];
                $valor = number_format($v['valor_total'], 2, '.', '');
                echo "['$modelo', $valor],";
            }
            ?>
        ]);

        var chartValores = new google.visualization.BarChart(document.getElementById('chart_valores'));
        chartValores.draw(dataValores, {
            title: 'Valor Total dos Contratos por Modelo de Veículo',
            chartArea: { width: '60%' },
            colors: ['#3366cc'], // Cor azul
            hAxis: { title: 'Valor Total (R$)', minValue: 0 },
            vAxis: { title: 'Modelo do Veículo' }
        });

        // Gráfico 2: Quantidade de aluguéis por modelo
        var dataQuantidades = google.visualization.arrayToDataTable([
            ['Modelo', 'Quantidade de Aluguéis'],
            <?php
            foreach ($quantidades as $q) {
                $modelo = $q['modelo_veiculo'];
                $quantidade = $q['quantidade'];
                echo "['$modelo', $quantidade],";
            }
            ?>
        ]);

        var chartQuantidades = new google.visualization.BarChart(document.getElementById('chart_quantidades'));
        chartQuantidades.draw(dataQuantidades, {
            title: 'Quantidade de Aluguéis por Modelo de Veículo',
            chartArea: { width: '60%' },
            colors: ['#109618'], // Cor verde
            hAxis: { title: 'Quantidade', minValue: 0 },
            vAxis: { title: 'Modelo do Veículo' }
        });

        // Gráfico 3: Pizza - Porcentagem por tipo de contrato
        var dataPizza = google.visualization.arrayToDataTable([
            ['Tipo de Contrato', 'Quantidade'],
            <?php
            foreach ($tiposContrato as $t) {
                $tipo = ucfirst($t['tipo_contrato']); // Deixa a primeira letra maiúscula
                $qtd = $t['quantidade'];
                echo "['$tipo', $qtd],";
            }
            ?>
        ]);

        var chartPizza = new google.visualization.PieChart(document.getElementById('chart_pizza'));
        chartPizza.draw(dataPizza, {
            title: 'Distribuição dos Tipos de Contrato (%)',
            is3D: true // Gráfico em 3D
        });
    }
</script>

<?php
// Inclui o rodapé da página
require_once('rodape.php');
?>
