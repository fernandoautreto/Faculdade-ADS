<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $notas = array();
            $nomes = $_POST['nome'];
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];
            $n3= $_POST['n3'];


            for ($i = 0; $i < 5; $i++) {
                $nome = $nomes[$i];
                $nota1 = $n1[$i];
                $nota2 = $n2[$i];
                $nota3 = $n3[$i];
                $media = ($nota1 + $nota2 + $nota3)/3;
                $notas[$nome] = $media;
            }

            // Ordena os notas decrescente (valor do array)
            arsort($notas);


            echo "<h2>Lista de Alunos</h2>";
            echo "<ul>";
            foreach ($notas as $nome => $media) {
                echo "<li><strong>$nome</strong>: $media</li>";
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