<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            //(floatval)tranforma um str em numero|(str_replace)vai fazer que mude a , para . se for necessário
            $capital = str_replace(',', '.', $_POST['capital']);
            $periodo = str_replace(',', '.', $_POST['periodo']);
            $juros = str_replace(',', '.', $_POST['juros']);
            $capJuros = $capital * ((1+($juros/100)) ** $periodo);
            echo "<p>Capital: R$ $capital</p><p> Taxa de juros: $juros %</p> <p>Período: $periodo</p> <p>Juros: R$ $capJuros</p>";
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