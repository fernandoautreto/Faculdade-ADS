<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <h6>Escolha um mês, e digite o número correspondente:</h6>
        <ol>
            <li>Janeiro</li>
            <li>Fevereiro</li>
            <li>Março</li>
            <li>Abril</li>
            <li>Maio</li>
            <li>Junho</li>
            <li>Julho</li>
            <li>Agosto</li>
            <li>Setembro</li>
            <li>Outubro</li>
            <li>Novembro</li>
            <li>Dezembro</li>
        </ol>
    </div>

    <form method="post" action="ex05resp.php">

            
        <div class="mb-3">
            <label for="mes" class="form-label">Informe um valor: </label>
            <input type="number" id="mes" name="mes" class="form-control" required="">
        </div>  
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>