<?php
function fNotificacao() {
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $query = "SELECT * FROM `contratos` WHERE `vencimento` < '{$hoje}' AND `gestor` = '{$_SESSION['nome_usuario']}'";
    $resultado = mysqli_query($conexao, $query);
    while($exibe2 = mysqli_fetch_assoc($resultado)){ 
        echo "<b>" . $_SESSION['nome_usuario'] . "</b>" . ", o contrato <b>{$exibe2['titulo']}</b>, de numero {$exibe2['contrato_id']} encontra-se vencido.</br>";
    };
    
};
// FUNÇÃO QUE CONTA AS NOTIFICAÇÕES
function contaNotificacoes() {
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
    $mes = date('Y-m-d', strtotime('+31 days', strtotime($hoje)));
    $query1 = "SELECT * FROM `contratos` WHERE `vencimento` < '{$hoje}' AND `gestor` = '{$_SESSION['nome_usuario']}'";
    $query2 = "SELECT * FROM `contratos` WHERE `vencimento` < '{$semana}' AND `gestor` = '{$_SESSION['nome_usuario']}'";

    
    $resultado1 = mysqli_query($conexao, $query1);
    $resultado2 = mysqli_query($conexao, $query2);

    
    $contalinha = (mysqli_num_rows($resultado1)) + (mysqli_num_rows($resultado2));
    echo $contalinha;
};
// FUNÇÃO QUE EXIBE OS CONTRATOS VENCIDOS NO DIA
function notificacao(){
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $query = "SELECT * FROM `contratos` WHERE `vencimento` <= '{$hoje}' AND `gestor` = '{$_SESSION['nome_usuario']}'";
    $resultado = mysqli_query($conexao, $query);

    while($exibe = mysqli_fetch_assoc($resultado)){ 
        
         echo "<li>
         <a href=\"contrato.php?id={$exibe["contrato_id"]}\">
         <i class=\"fa fa-warning text-red\"></i> O contrato <b>{$exibe['titulo']}</b>, de numero {$exibe['numero']} encontra-se vencido.</a>
         </li>";
    };
};
// FUNÇÃO QUE EXIBE OS CONTRATOS VENCIDOS NA SEMANA
function notificacaosemana(){
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
    $query = "SELECT * FROM `contratos` WHERE `vencimento` < '{$semana}' AND `vencimento` > '{$hoje}' AND `gestor` = '{$_SESSION['nome_usuario']}'";
    $resultado = mysqli_query($conexao, $query);
    while($exibe = mysqli_fetch_assoc($resultado)){ 
        
         echo "<li>
         <a href=\"contrato.php?id={$exibe["contrato_id"]}\">
         <i class=\"fa fa-warning text-yellow\"></i> O contrato <b>{$exibe['titulo']}</b>, de numero {$exibe['numero']} vence esta semana!</a>
         </li>";
    };
};
// FUNÇÃO QUE EXIBE OS CONTRATOS VENCIDOS NO MES
function notificacaomes(){
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
    $mes = date('Y-m-d', strtotime('+31 days', strtotime($hoje)));
    $query = "SELECT * FROM `contratos` WHERE `vencimento` < '{$mes}' AND `vencimento` > '{$semana}' AND `gestor` = '{$_SESSION['nome_usuario']}'";
    $resultado = mysqli_query($conexao, $query);
    while($exibe = mysqli_fetch_assoc($resultado)){ 
        
         echo "<li>
         <a href=\"contrato.php?id={$exibe["contrato_id"]}\">
         <i class=\"fa fa-warning text-blue\"></i> O contrato <b>{$exibe['titulo']}</b>, de numero {$exibe['numero']} vence este mês!</a>
         </li>";
    };
};
function notificacaomesesanteriores(){
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
    $mes = date('Y-m-d', strtotime('+60 days', strtotime($hoje)));
    $query = "SELECT * FROM `contratos` WHERE `vencimento` < '{$mes}' AND `vencimento` = '{$hoje}'";
    $resultado = mysqli_query($conexao, $query);
    $total = mysqli_num_rows($resultado);

    echo $total;

    while($exibe = mysqli_fetch_assoc($resultado)){


    };
};

//Exibe o Numero De Contratos Vencidos
function contratosVencidos(){
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $hoje = date('Y-m-d');
    $query = "SELECT * FROM `contratos` WHERE `vencimento` <= '{$hoje}'";
    $resultado = mysqli_query($conexao, $query);
    $contalinha = mysqli_num_rows($resultado);
    echo $contalinha;
};

function recebeNumeros($n1,$n2,$n3){
    $oArray = array($n1,$n2,$n3);
    asort($oArray);    
    foreach($oArray as $resultado => $val){
        echo $resultado;    
    
    };

    function exibirSetores() {
        $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
        $query = "SELECT * FROM `contratos.setores`";
        $resultado = mysqli_query($conexao, $query);
            if (mysqli_num_rows($resultado) > 0) {
                return $resultado;
            }else{
                    return false;
                }
            }
};

    function verificacontratos() {
    $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
    $query = "SELECT * FROM `contratos`";
    $resultado = mysqli_query($conexao, $query);
    $obj=mysqli_fetch_object($resultado);

    echo $resultado;
};