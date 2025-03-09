<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    function difetencaTempo(int $data1, int $data2): int{
        if($data1 < $data2)
            return ($data2 - $data1) / (60 * 60 * 24);
        else
            return ($data1 - $data2) / (60 * 60 * 24);
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            //a funaçao strtotime vai pegar a data e transformar ela em segundo, com referencia 01/01/70
            $data1 = strtotime($_POST['data1']);
            $data2 = strtotime($_POST['data2']);
            
            echo difetencaTempo($data1, $data2);
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