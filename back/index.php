<?php
//Arquivo De Configuração
include('back/config.php');
//Arquivo de verificação de login
include('back/verifica.php');
//Arquivo de redirecionamento
include('back/redir.php');
?>
Olá <b><?php echo $_SESSION['usuario']?></b>, <a href="back/sair.php">Clique Aqui Para Sair</a>