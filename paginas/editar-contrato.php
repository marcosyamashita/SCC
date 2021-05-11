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
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$setor = $_SESSION['setor_id'];
$gestor = $_SESSION['nome_usuario'];
$vencimento = $_POST['venci'];
$pagamento = $_POST['pagamento'];
$alertacontrato = $_POST['alerta_contrato'];
$emailcontrato = $_POST['email_contrato'];
$alertapagamento = $_POST['alerta_pagamento'];
$emailpagamento = $_POST['email_pagamento'];
$repetir = $_POST['repetir'];
$tempoindeterminado = $_POST['tempo_indeterminado'];
$inicio = $_POST['inicio'];
$valor = $_POST['valor'];
$numero = $_POST['numero'];
$numeroproton = $_POST['numeroproton'];
$id = $_GET['id'];
$querydiretorio = "select * from contratos where contrato_id= {$id}";

//$userfile = $_FILES['userfile'];
//Dados De Conexão
$conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
//Dados da query
$query = "UPDATE `contratos` SET `titulo` = '{$titulo}', `descricao` = '{$descricao}', `gestor` = '{$gestor}', `setor_id` = '{$setor}', `vencimento` = '{$vencimento}',`pagamento` = '{$pagamento}',`alerta_pagamento` = '{$alertapagamento}',`alerta_contrato` = '{$alertacontrato}',`email_pagamento` = '{$emailpagamento}',`email_contrato` = '{$emailcontrato}',`repetir` = '{$repetir}', `tempoindeterminado` = '{$tempoindeterminado}', `inicio` = '{$inicio}', `valor` = '{$valor}', `numero` = '{$numero}' WHERE `contratos`.`contrato_id` = {$id}";
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
    echo "<script>alert('Contrato Alterado Com Sucesso!');</script>";
}else {
    echo "<script>alert('O Contrato não pode ser Alterado.')</script>";
}
//Fechando conexão
mysqli_close($conexao);
// Retorna o usuario a pagina de adição de contrato
echo '<meta http-equiv="refresh" content="0;url=listar.php" />';

print "</pre>";
