<?php
// Inclui o cabeçalho da página, que contém o início do layout padrão e o menu (se houver)
require_once("cabecalho.php");
?>

<!-- Container centralizado para organizar o conteúdo da página -->
<div class="container mt-5 text-center">

  <!-- Título principal de boas-vindas -->
  <h1 class="mb-4">
    Bem-vindo ao
    <!-- Destaque em cor verde escuro apenas na parte "AutoRent Express" -->
    <span style="color: #3a5a40;">AutoRent Express</span>
  </h1>

  <!-- Parágrafo com uma descrição simples do sistema -->
  <p class="lead mb-5">
    Seu sistema prático e rápido para controle e gerenciamento de locação de veículos.
  </p>
</div>

<?php
// Inclui o rodapé da página, que finaliza o layout padrão
require_once("rodape.php");
?>