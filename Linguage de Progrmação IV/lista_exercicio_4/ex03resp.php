<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    function buscarPalavra(string $palavra1, string $palavra2): bool
    {
        return (str_contains($palavra2, $palavra1)); //a função str_contains ela serve para verificar se a palavra esta contida em outra, e retorna um true ou false.
    }         
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $palavra1 = $_POST['palavra'];
            $palavra2 = $_POST['palavra2'];
            if (buscarPalavra($palavra1, $palavra2))
                echo "A palavra ($palavra1) esta na palavra ($palavra2)";
            else
                echo "Não contem.";
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