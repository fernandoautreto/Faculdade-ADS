<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $produtos = array();
            $nomes = $_POST['nome'];
            $valor = $_POST['valor'];

            for ($i = 0; $i < 5; $i++) {
                $nome = $nomes[$i];
                $preco = floatval($valor[$i]);

                // Aplica o desconto de 10% se o preço for maior que R$100
                $preco += $preco * 0.15;  // adiciona 15% ao preço
                $produtos[$nome] = $preco;
            }

            asort($produtos);

            echo "<h2>Lista de Produtos</h2>";
            echo "<ul>";
            foreach ($produtos as $nome => $preco) {
                echo "<li><strong>Nome:</strong> " . $nome . " Preço: R$ " . number_format($preco, 2, ',', '.') . "</li>";
            }
            echo "</ul>";

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>