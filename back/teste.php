<?php


$conexao = mysqli_connect('localhost', 'root', '', 'contratos');
$hoje = date('Y-m-d');
$semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
$mes = date('Y-m-d', strtotime('+31 days', strtotime($hoje)));
$query = "SELECT * FROM `contratos`";
$resultado = mysqli_query($conexao, $query);
$linhas = mysqli_num_rows($resultado);

while($linha = mysqli_fetch_assoc($resultado)) {

     echo "vencimento: " . $linha['vencimento']. "- titulo: " .$linha['titulo']. " - alertacontrato: " .$linha['alerta_contrato']. " - emailcontrato: " .$linha['email_contrato'] . "- numero: " .$linha['numero']. "- valor: " .$linha['valor']. " - Enviado:" .$linha['enviado']. "<br>";

    /*$vencimento = $linha['vencimento'];
    $titulo = $linha['titulo'];
    $alertacontrato = $linha['alerta_contrato'];
    $emailcontrato = $linha['email_contrato'];
    $alertapagamento = $linha['alerta_pagamento'];
    $emailpagamento = $linha['email_pagamento'];
    $numero = $linha['numero'];
    $valor = $linha['valor'];
    */

}

?>


//envio email para contratos
$Mailer = new PHPMailer();
//Define que será usado SMTP
$Mailer->IsSMTP();
//Enviar e-mail em HTML
$Mailer->isHTML(true);
//Aceitar carasteres especiais
$Mailer->Charset = 'UTF-8';
//Configurações
$Mailer->SMTPAuth = true;
//$Mailer->SMTPSecure = 'tls';
//nome do servidor
$Mailer->Host = 'smtp.gmail.com';
//Porta de saida de e-mail
$Mailer->Port = 25;
//Dados do e-mail de saida - autenticação
$Mailer->Username = 'marcospauloyamashita@gmail.com';
$Mailer->Password = 'marcos1991';
//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
$Mailer->From = ('marcospauloyamashita@gmail.com');
//Nome do Remetente
$Mailer->FromName = 'Teste';
//Assunto da mensagem
$Mailer->Subject = 'Alerta - Contratos';
//Corpo da Mensagem
$Mailer->Body = "<html><head><meta charset='utf-8'></head><body>
<img src=\"http://www.sicoobcrediembrapa.com.br/images/imgs/cabecalho.jpg\"><br><table width=\"600\" border=\"0\"><tbody><tr>
        <td>Prezado(a) SPL - (Setor de Patrimonio e Logistica), <br><br>
            O contrato Numero: <b>" . $numero . "</b>  com o nome de: <b>" . $titulo . "</b> esta vencendo dia: <b>" . date('d/m/Y', strtotime($vencimento)) . "</b> verifique a renovacao ou finalizacao do contrato.</td></tr></tbody></table>
</body></html>";
//Corpo da mensagem em texto
$Mailer->AltBody = 'conteudo do E-mail em texto';
//Destinatario
$Mailer->AddAddress('marcospauloyamashita@gmail.com', 'Usuario - Address');
if ($Mailer->Send()) {
echo "E-mail enviado com sucesso";
} else {
echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
}
} elseif ($alertapagamento = $hoje) {
//envio email para pagamentos

} elseif ($alertapagamento = $hoje and $alertacontrato = $hoje) {
//envio email para pagamentos e contratos

} else {

}

}
