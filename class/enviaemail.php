<?php

require_once '../plugins/PHPMailer/PHPMailerAutoload.php';
require_once '../plugins/PHPMailer/class.smtp.php';

require_once '../back/enviar_email.php';



class enviaemail
{
    function enviaemail()
    {

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
        $Mailer->Subject = 'Titulo - Recuperar Senha';
        //Corpo da Mensagem
        $Mailer->Body = 'Conteudo do E-mail';
        //Corpo da mensagem em texto
        $Mailer->AltBody = 'conteudo do E-mail em texto';
        //Destinatario
        $Mailer->AddAddress($linha['email_contrato'] , 'Usuario - Address');
        if ($Mailer->Send()) {
            echo "E-mail enviado com sucesso";
        } else {
            echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
        }
    }
}
