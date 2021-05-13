 <?php
	session_start();
	include_once('../back/conexaorelatorio.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'relatorio_contratos.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
        $hoje = date('d-m-Y H:i');
		$html .= '<td colspan="16">Relatorio completo de Contratos</td>'.'<td>Criado:'.$hoje.'</td>'.'</tr>';
		$html .= '</tr>';

		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Titulo</b></td>';
		$html .= '<td><b>Descrição</b></td>';
		$html .= '<td><b>Setor_ID</b></td>';
		$html .= '<td><b>inicio</b></td>';
        $html .= '<td><b>Vencimento</b></td>';
        $html .= '<td><b>Pagamento</b></td>';
        $html .= '<td><b>Data de Alerta de Contrato</b></td>';
        $html .= '<td><b>E-mail Contrato</b></td>';
        $html .= '<td><b>Data de Alerta de Pagamento</b></td>';
        $html .= '<td><b>E-mail Pagamento</b></td>';
        $html .= '<td><b>Valor</b></td>';
        $html .= '<td><b>Numero</b></td>';
        $html .= '<td><b>Contrato ou Doc. Oficial</b></td>';
        $html .= '<td><b>Numero Proton</b></td>';
        $html .= '<td><b>Repetir</b></td>';
        $html .= '<td><b>Enviado</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_msg_contatos = "SELECT * FROM contratos.contratos";
		$resultado_msg_contatos = mysqli_query($conn , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["contrato_id"].'</td>';
			$html .= '<td>'.$row_msg_contatos["titulo"].'</td>';
			$html .= '<td>'.$row_msg_contatos["descricao"].'</td>';
			$html .= '<td>'.$row_msg_contatos["setor_id"].'</td>';
			$data_inicio = date('d-m-Y', strtotime($row_msg_contatos["inicio"]));
			$html .= '<td>'.$data_inicio.'</td>';
            $data_vencimento = date('d-m-Y', strtotime($row_msg_contatos["vencimento"]));
            $html .= '<td>'.$data_vencimento.'</td>';
            $data_pagamento = date('d-m-Y', strtotime($row_msg_contatos["pagamento"]));
            $html .= '<td>'.$data_pagamento.'</td>';
            $alerta_contrato = date('d-m-Y', strtotime($row_msg_contatos["alerta_contrato"]));
            $html .= '<td>'.$alerta_contrato.'</td>';
            $html .= '<td>'.$row_msg_contatos["email_contrato"].'</td>';
            $alerta_pagamento = date('d-m-Y', strtotime($row_msg_contatos["alerta_pagamento"]));
            $html .= '<td>'.$alerta_pagamento.'</td>';
            $html .= '<td>'.$row_msg_contatos["email_pagamento"].'</td>';
            $html .= '<td>'.$row_msg_contatos["valor"].'</td>';
            $html .= '<td>'.$row_msg_contatos["numero"].'</td>';
            $html .= '<td>'.$row_msg_contatos["contrato"].'</td>';
            $html .= '<td>'.$row_msg_contatos["numeroproton"].'</td>';
            $html .= '<td>'.$row_msg_contatos["repetir"].'</td>';
            $html .= '<td>'.$row_msg_contatos["enviado"].'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>