<?php

// Ativa o modo estrito de tipos no PHP (obriga o uso correto de tipos nas funções e variáveis)
declare(strict_types=1);

// Define as informações de conexão com o banco de dados (host, nome do banco, usuário e senha)
$dominio = "mysql:host=localhost;dbname=locadoraveículophp"; // Tipo de banco (MySQL), endereço do servidor e nome do banco
$usuario = "root"; // Nome do usuário do banco (padrão do XAMPP)
$senha = ""; // Senha do banco (vazia no XAMPP por padrão)

try {
    // Cria uma nova conexão PDO com as informações fornecidas
    $pdo = new PDO($dominio, $usuario, $senha);

    // Caso a conexão aconteça com sucesso, a variável $pdo estará pronta para ser usada nas consultas SQL

} catch (PDOException $e) {
    // Caso a conexão falhe, exibe uma mensagem de erro e encerra o programa
    die("Erro ao conectar com o banco! " . $e->getMessage());
}
