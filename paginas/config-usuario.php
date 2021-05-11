<?php
// Inclui o arquivo de configuração
include('../back/config.php');

// Inclui o arquivo de verificação de login
include('../back/verifica.php');

// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para
// o formulário de login
include('../back/redir.php');
//Pegando dados com POST e adicionando ao banco de dados
$id = $_GET["user_id"];
$login = $_GET["user"];
$nome = $_GET["user_name"];
$senha = $_GET['user_password'];
$crypt = crypt($senha);
$setor = $_GET['setor_id'];
$email = $_GET['user_email'];
$avatar = $_GET['avatar'];

$querydiretorio = "select * from usuarios where user_id= {$id}";

//$userfile = $_FILES['userfile'];
//Dados De Conexão
$conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
//Dados da query
$query = "UPDATE `usuarios` SET `user_id` = '{$id}', `user` = '{$login}', `user_name` = '{$nome}',`user_password` = '{$crypt}', `setor_id` = '{$setor}', `user_email` = '{$email}', `avatar_user` = '{$avatar}' WHERE `usuarios`.`user_id` = {$id}";
//Enviando Arquivos
$resultado = mysqli_query($conexao, $querydiretorio);
while($exibe = mysqli_fetch_assoc($resultado)){
    if(isset($_FILES['userfile'])){
        $extensao = strtolower(substr($_FILES['userfile']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "../upload/" . $exibe['diretorio'] . "/";
        move_uploaded_file($_FILES['userfile']['tmp_name'], $diretorio.$novo_nome);
    }
};
//Executando a query
if(mysqli_query($conexao, $query)){
    echo "<script>alert('Usuário Alterado Com Sucesso!');</script>";
}else {
    echo mysqli_error($resultado);
    echo "<script>alert('O Usuário não pode ser Alterado.')</script>";

}
//Fechando conexão
mysqli_close($conexao);
// Retorna o usuario a pagina de adição de contrato
echo '<meta http-equiv="refresh" content="0;url=listar_usuarios.php" />';

print "</pre>";
