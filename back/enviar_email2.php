<?php

require_once '/var/www/html/SCC/plugins/PHPMailer/PHPMailerAutoload.php';
require_once '/var/www/html/SCC/plugins/PHPMailer/class.smtp.php';

$conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
$hoje = date('d-m-Y');
$semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
$mes = date('Y-m-d', strtotime('+31 days', strtotime($hoje)));
$query = "SELECT * FROM `contratos`";
$resultado = mysqli_query($conexao, $query);
$linhas = mysqli_num_rows($resultado);
$txtenviado = "Email enviado dia: ".$hoje;
$txtnaoenviado = "Email não enviado:";
$txt = "/var/www/html/SCC/log/ log_$hoje.txt";

while($linha = mysqli_fetch_assoc($resultado)) {
    $vencimento = date('d-m-Y', strtotime($linha['vencimento']));
    $titulo = $linha['titulo'];
    $alertacontrato = date('d-m-Y', strtotime($linha['alerta_contrato']));
    $emailcontrato = $linha['email_contrato'];
    $alertapagamento = date('d-m-Y', strtotime($linha['alerta_pagamento']));
    $emailpagamento = $linha['email_pagamento'];
    $numero = $linha['numero'];
    $valor = $linha['valor'];
    $enviado = $linha['enviado'];
    $pagamento = date('d-m-Y', strtotime($linha['pagamento']));

    if ($alertapagamento == $hoje && $alertacontrato == $hoje && $enviado == "0") {
        $arquivo = fopen($txt, "w+");
        fwrite($arquivo, $txtenviado);
        fclose($arquivo);

        echo "contrato e pagamento"." = ".$titulo." ";
        echo $alertapagamento."//". $alertacontrato;
    } else if ($alertapagamento == $hoje AND $enviado == "0") {
        echo "</br>"."somente pagamento"." = ".$titulo." ";
        echo $alertapagamento;
    } else if ($alertacontrato == $hoje AND $enviado == "0") {
        echo "</br>"."somente contrato"." = ".$titulo." ";
        echo $alertacontrato;
    }

}

?>