<?php
// Inclui o arquivo de configuração
include('../back/config.php');

// Inclui o arquivo de verificação de login
include('../back/verifica.php');
include('../back/functions.php');
//include('../back/enviar_email.php');
// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para
// o formulário de login
include('../back/redir.php');
// Conexao Com banco De Dados
$conexao = mysqli_connect('localhost', 'root', 'otrsdb', 'contratos');
// Seleciona e conta todos os contratos
$query = "select * from contratos";
$resultado = mysqli_query($conexao, $query);
$todoscontratos=mysqli_num_rows($resultado);
// Seleciona e conta todos os usuarios
$query2 = "select * from usuarios";
$resultado2 = mysqli_query($conexao, $query2);
$todososusuarios = mysqli_num_rows($resultado2);

while($exibe = mysqli_fetch_assoc($todososusuarios)){
print_r($exibe['avatar_user']);
};

?>