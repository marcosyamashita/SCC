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
$fornecedor = $_POST["fornecedor"];
$setor = $_SESSION['setor_id'];
$gestor = $_SESSION['nome_usuario'];
$vencimento = $_POST['venci'];
$pagamento = $_POST['pagamento'];
$alertacontrato = $_POST['alerta_contrato'];
$emailcontrato = $_POST['email_contrato'];
$alertapagamento = $_POST['alerta_pagamento'];
$emailpagamento = $_POST['email_pagamento'];
$repetir = $_POST['repetir'];
$contrato = $_POST['contrato'];
$tempoindeterminado = $_POST['tempo_indeterminado'];
$inicio = $_POST['inicio'];
$valor = $_POST['valor'];
$numero = $_POST['numero'];
$numeroproton = $_POST['numeroproton'];
$diretorionome = md5(time());
//$userfile = $_FILES['userfile'];
//Dados De Conexão
$conexao = mysqli_connect('localhost', 'root', 'otrsdb', 'contratos');
//Dados da query
$query = "insert into contratos(titulo, descricao, fornecedor, gestor, setor_id, vencimento, pagamento, inicio, alerta_contrato, email_contrato, alerta_pagamento, email_pagamento, repetir, contrato, tempoindeterminado, valor, numero, numeroproton, diretorio) values ('{$titulo}', '{$descricao}', '{$fornecedor}', '{$gestor}', '{$setor}', '{$vencimento}', '{$pagamento}', '{$inicio}', '{$alertacontrato}', '{$emailcontrato}', '{$alertapagamento}', '{$emailpagamento}', '{$repetir}', '{$contrato}', '{$tempoindeterminado}', '{$valor}', '{$numero}', '{$numeroproton}', '{$diretorionome}')";
//Criando Pasta e Armazenando o Arquivo
if(isset($_FILES['userfile'])){
    mkdir('../upload/'.$diretorionome, 0777, true);
    $extensao = strtolower(substr($_FILES['userfile']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../upload/" . $diretorionome . "/";    
    move_uploaded_file($_FILES['userfile']['tmp_name'], $diretorio.$novo_nome);
}

//Executando a query
if(mysqli_query($conexao, $query)){
    echo "<script>alert('Contrato Adicionado Com Sucesso!');</script>";
}else {
    echo "<script>alert('O Contrato não pode ser adicionado.')</script>";
}
//Fechando conexão
mysqli_close($conexao);
// Retorna o usuario a pagina de adição de contrato
echo '<meta http-equiv="refresh" content="0;url=adicionar.php" />';

print "</pre>";
