<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $n1 = $_POST["n1"];
            $n2 = $_POST["n2"];
            $n3 = $_POST["n3"];
            $n4 = $_POST["n4"];
            $n5 = $_POST["n5"];
            $n6 = $_POST["n6"];
            $n7 = $_POST["n7"];
            $menor = $n1;
            $posicao = 1;
            for ($i = 0; $i < 7; $i++) {
                switch ($i) {
                    case 0:
                        $valor = $n1;
                        break;
                    case 1:
                        $valor = $n2;
                        break;
                    case 2:
                        $valor = $n3;
                        break;
                    case 3:
                        $valor = $n4;
                        break;
                    case 4:
                        $valor = $n5;
                        break;
                    case 5:
                        $valor = $n6;
                        break;
                    case 6:
                        $valor = $n7;
                        break;
                }
                if ($valor < $menor) {
                    $menor = $valor;
                    $posicao = $i;
                }
            }
            echo "Menor: $menor, Posição: $posicao";

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