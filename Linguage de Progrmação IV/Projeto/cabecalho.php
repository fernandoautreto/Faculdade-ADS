<?php
session_start();
if (!$_SESSION['acesso']) {
  header("location: index.php?mensagem=acesso_negado");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="estilos.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="principal.php" style="font-weight: 700; font-size: 1.4rem;">
      <i class="bi bi-house-door-fill fs-3"></i>
      <span>AutoRent Express</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Menu principal alinhado à esquerda -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3" href="veiculo.php">Veículos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="aluguel.php">Aluguéis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="contratos.php">Contratos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="cliente.php">Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="dashboard.php">Dashboard</a>
        </li>
      </ul>

      <!-- Dropdown do usuário alinhado à direita -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-4 me-2"></i> <?= htmlspecialchars($_SESSION['usuario']) ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="alterar_dados.php">Alterar Dados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger fw-bold" href="sair.php" id="logoutButton">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <main class="container">