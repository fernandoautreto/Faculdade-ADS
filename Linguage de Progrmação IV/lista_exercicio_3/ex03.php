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
    
    <form method="post" action="ex03resp.php">

              
        <div class="mb-3">
            <label for="n1" class="form-label">Informe um número: </label>
            <input type="number" id="n1" name="n1" class="form-control"  required="">
        </div>  
        
         <div class="mb-3">
            <label for="n2" class="form-label">Informe um numero: </label>
            <input type="number" id="n2" name="n2" class="form-control"  required="">

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>