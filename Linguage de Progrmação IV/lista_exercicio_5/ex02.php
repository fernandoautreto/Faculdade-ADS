<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="ex02resp.php" method="POST">
        <?php for ($i = 0; $i < 5; $i++): ?>
                <div class="mb-3">
                    <label for="nome[]" class="form-label">Informe o nome: </label>
                    <input type="text" name="nome[]" placeholder="Nome" />
                </div>

                <div class="mb-3">
                    <label for="n1[]" class="form-label">Informe a 1º nota: </label>
                    <input type="number" step="0.01" name="n1[]" placeholder="Nota" />
                </div>

                  <div class="mb-3">
                    <label for="n2[]" class="form-label">Informe a 2º nota: </label>
                    <input type="number" step="0.01" name="n2[]" placeholder="Nota" />
                </div>

                  <div class="mb-3">
                    <label for="n3[]" class="form-label">Informe a 3º nota: </label>
                    <input type="number" step="0.01" name="n3[]" placeholder="Nota" />
                </div>
        <?php endfor; ?>
        <button type="submit">Enviar</button>
    </form>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
