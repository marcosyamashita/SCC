<?php
// Inclui o arquivo de configuração
include('back/config.php');

// Inclui o arquivo de verificação de login
include('back/verifica.php');

// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('back/redir.php');
?>

<!-- Olá <b><?php echo $_SESSION['nome_usuario']?></b>, <a href="../back/sair.php">clique aqui</a> para sair. -->

<script language= "JavaScript">
location.href="paginas/index.php"
</script>