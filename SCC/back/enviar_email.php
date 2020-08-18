<?php

require_once '/var/www/html/SCC/plugins/PHPMailer/PHPMailerAutoload.php';
require_once '/var/www/html/SCC/plugins/PHPMailer/class.smtp.php';

    $conexao = mysqli_connect('localhost', 'root', 'otrsdb', 'contratos');
    $hoje = date('d-m-Y');
    $semana = date('Y-m-d', strtotime('+7 days', strtotime($hoje)));
    $mes = date('Y-m-d', strtotime('+31 days', strtotime($hoje)));
    $query = "SELECT * FROM `contratos`";
    $resultado = mysqli_query($conexao, $query);
    $linhas = mysqli_num_rows($resultado);
    $txtenviado = "E-mail enviado com sucesso";
    $txtnaoenviado = "Erro no envio do e-mail: ";
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
//envio email para pagamentos e contratos
        $Mailer = new PHPMailer();
        $Mailer->SMTPDebug = 0;
        $Mailer->IsSMTP();
        $Mailer->isHTML(true);
        $Mailer->Charset = 'UTF-8';
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'tls';
        $Mailer->Host = 'smtp.gmail.com';
        $Mailer->Port = 587;
        $Mailer->Username = 'contratossicoob@gmail.com';
        $Mailer->Password = 'contratos2018';
        $Mailer->From = ('contratossicoob@gmail.com');
        $Mailer->FromName = 'Sistema de Contratos - SCC';
        $Mailer->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $Mailer->Subject = 'Alerta - Contratos';
        $Mailer->Body = "<html><head><meta charset='utf-8'></head><body>
                             <img src=\"http://www.sicoobcrediembrapa.com.br/images/imgs/cabecalho.jpg\"><br><table width=\"600\" border=\"0\"><tbody><tr>
                             <td>Prezado(a) SPL - (Setor de Patrimonio e Logistica) e SEFIN - (Setor Financeiro), <br><br>
                             O contrato Numero: <b>" . $numero . "</b>  com o nome de: <b>" . $titulo . "</b> esta vencendo dia: <b>" .$vencimento. "</b> e a data de pagamento e dia: ".$pagamento."</td></tr></tbody></table>
</body></html>";
        $Mailer->AltBody = 'conteudo do E-mail em texto';
        $Mailer->AddAddress($emailcontrato, 'Usuario - Address');
        $Mailer->AddAddress($emailpagamento, 'Usuario - Address');
        if ($Mailer->Send()) {
            $arquivo = fopen($txt, "w+");
            fwrite($arquivo, $txtenviado);
            fclose($arquivo);

            echo "E-mail enviado com sucesso";
            //Alterando o status de enviado para não duplicar

            $sqlEdicao_usuarios = " UPDATE contratos SET enviado = 1";
            $resultado2 = mysqli_query($conexao, $sqlEdicao_usuarios);


        } else {
            $arquivo = fopen($txt, "w+");
            fwrite($arquivo, $txtnaoenviado);
            fclose($arquivo);
            echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
        }
    } else if ($alertapagamento == $hoje AND $enviado == "0") {
//envio email para pagamentos
            $Mailer = new PHPMailer();
            $Mailer->SMTPDebug = 0;
            $Mailer->IsSMTP();
            $Mailer->isHTML(true);
            $Mailer->Charset = 'UTF-8';
            $Mailer->SMTPAuth = true;
            $Mailer->SMTPSecure = 'tls';
            $Mailer->Host = 'smtp.gmail.com';
            $Mailer->Port = 587;
            $Mailer->Username = 'contratossicoob@gmail.com';
            $Mailer->Password = 'contratos2018';
            $Mailer->From = ('contratossicoob@gmail.com');
            $Mailer->FromName = 'Sistema de Contratos - SCC';
             $Mailer->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                 )
              );
            $Mailer->Subject = 'Alerta - Contratos';
            $Mailer->Body = "<html><head><meta charset='utf-8'></head><body>
                             <img src=\"http://www.sicoobcrediembrapa.com.br/images/imgs/cabecalho.jpg\"><br><table width=\"600\" border=\"0\"><tbody><tr>
                             <td>Prezado(a) SEFIN - (Setor Financeiro), <br><br>
                             O contrato Numero: <b>" . $numero . "</b>  com o nome de: <b>" . $titulo . "</b> esta com a data de pagamento para o dia: <b>" .$pagamento. "</b> verifique o pagamento.</td></tr></tbody></table>
</body></html>";
            $Mailer->AltBody = 'conteudo do E-mail em texto';
            $Mailer->AddAddress($emailpagamento, 'Usuario - Address');
            if ($Mailer->Send()) {

                //Gera um log diario e salva na pasta log do projeto

                $arquivo = fopen($txt, "w+");
                fwrite($arquivo, $txtenviado);
                fclose($arquivo);

                echo "E-mail enviado com sucesso";
                //Alterando o status de enviado para não duplicar

                $sqlEdicao_usuarios = " UPDATE contratos SET enviado = 1";
                $resultado2 = mysqli_query($conexao, $sqlEdicao_usuarios);


            } else {

                $arquivo = fopen($txt, "w+");
                fwrite($arquivo, $txtnaoenviado);
                fclose($arquivo);

                echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
            }

        } else if ($alertacontrato == $hoje AND $enviado == "0") {
            $Mailer = new PHPMailer();
            $Mailer->SMTPDebug = 0;
            $Mailer->IsSMTP();
            $Mailer->isHTML(true);
            $Mailer->Charset = 'UTF-8';
            $Mailer->SMTPAuth = true;
            $Mailer->SMTPSecure = 'tls';
            $Mailer->Host = 'smtp.gmail.com';
            $Mailer->Port = 587;
            $Mailer->Username = 'contratossicoob@gmail.com';
            $Mailer->Password = 'contratos2018';
            $Mailer->From = ('contratossicoob@gmail.com');
            $Mailer->FromName = 'Sistema de Contratos - SCC';
            $Mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $Mailer->Subject = 'Alerta - Contratos';
            $Mailer->Body = "<html><head><meta charset='utf-8'></head><body>
                             <img src=\"http://www.sicoobcrediembrapa.com.br/images/imgs/cabecalho.jpg\"><br><table width=\"600\" border=\"0\"><tbody><tr>
                             <td>Prezado(a) SPL - (Setor de Patrimonio e Logistica), <br><br>
                             O contrato Numero: <b>" . $numero . "</b>  com o nome de: <b>" . $titulo . "</b> esta vencendo dia: <b>" .$vencimento. "</b> verifique a renovacao ou finalizacao do contrato.</td></tr></tbody></table>
</body></html>";
            $Mailer->AltBody = 'conteudo do E-mail em texto';
            $Mailer->AddAddress($emailcontrato, 'Usuario - Address');
            if ($Mailer->Send()) {
                //Gera um log diario e salva na pasta log do projeto

                $arquivo = fopen($txt, "w+");
                fwrite($arquivo, $txtenviado);
                fclose($arquivo);

                echo "E-mail enviado com sucesso";
                //Alterando o status de enviado para não duplicar

                $sqlEdicao_usuarios = " UPDATE contratos SET enviado = 1";
                $resultado2 = mysqli_query($conexao, $sqlEdicao_usuarios);


            } else {

                $arquivo = fopen($txt, "w+");
                fwrite($arquivo, $txtnaoenviado);
                fclose($arquivo);

                echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
            }
        }

    }

?>