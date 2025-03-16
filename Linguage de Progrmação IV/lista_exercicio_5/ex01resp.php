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
            $contatos = array();
            $nomes = $_POST['nome']; 
            $telefones = $_POST['tel']; 
    
            
            for ($i = 0; $i < 5; $i++) {
                $nome = $nomes[$i]; 
                $telefone = $telefones[$i]; 
    
                // Verifica se o nome já existe no array
                $nomeExiste = false;
                foreach($contatos as $chave => $valor){
                    if ($chave == $nome){
                        $nomeExiste = true;
                        break;
                    }
                }
                if ($nomeExiste){
                    echo "O nome '$nome' já está cadastrado!!<br>";
                    continue;
                }
                // Verifica se o telefone já foi cadastrado
                if (in_array($telefone, $contatos)) {
                    echo "O telefone '$telefone' já está cadastrado.<br>";
                    continue; 
                }

                $contatos[$nome] = $telefone;
            }

            // Ordena os contatos alfabeticamente pelos nomes (chaves do array)
            ksort($contatos);

            
            echo "<h2>Lista de Contatos</h2>";
            echo "<ul>";
            foreach ($contatos as $nome => $telefone) {
                echo "<li><strong>$nome</strong>: $telefone</li>";
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