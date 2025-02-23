<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="exercicio18resposta.php">

        <div class="mb-3">
            <label for="capital" class="form-label">Informe o capital: </label>
            <input type="numb" id="capital" name="capital" class="form-control" step="0,01" required="">
        </div>

        <div class="mb-3">
            <label for="periodo" class="form-label">Informe o período: </label>
            <input type="numb" id="periodo" name="periodo" class="form-control" step="0,01"  required="">
        </div>

         <div class="mb-3">
            <label for="juros" class="form-label">Informe a taxa de juros: </label>
            <input type="numb" id="juros" name="juros" class="form-control" step="0,01" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>