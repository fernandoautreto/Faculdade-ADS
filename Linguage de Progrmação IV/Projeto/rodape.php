</main>

<!-- Inclusão da biblioteca SweetAlert2 para alertas personalizados -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

<!-- Inclusão da biblioteca Bootstrap JS (versão 5.3.3) para componentes dinâmicos -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
</script>

<script>
  // Adiciona um evento de clique ao botão de logout
  document.getElementById("logoutButton").addEventListener("click", function(event) {
    event.preventDefault(); // Impede que o navegador execute o link imediatamente

    // Exibe o alerta de confirmação usando SweetAlert2
    Swal.fire({
      title: 'Você tem certeza?', // Título do alerta
      text: "Deseja sair do sistema?", // Mensagem de descrição
      icon: 'warning', // Ícone de alerta
      showCancelButton: true, // Exibe botão de cancelar
      confirmButtonText: 'Sim, sair', // Texto do botão de confirmação
      cancelButtonText: 'Cancelar', // Texto do botão de cancelar
      reverseButtons: true // Inverte a posição dos botões
    }).then((result) => {
      // Verifica se o usuário confirmou
      if (result.isConfirmed) {
        // Se confirmado, redireciona para a página de logout
        window.location.href = "sair.php";
      }
    });
  });
</script>

</body>
</html>
