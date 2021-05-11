<?php	

	include_once("conexaorelatorio.php");
	$html = '<table border=0,5';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th style="padding-right: 40px; position: center;">ID</th>';
	$html .= '<th style="padding-right: 70px; position: center;">Titulo</th>';
	$html .= '<th style="padding-right: 40px; position: center;">Contrato</th>';
	$html .= '<th style="padding-right: 40px; position: center;">Inicio</th>';
    $html .= '<th style="padding-right: 40px; position: center;">Vencimento</th>';
    $html .= '<th style="padding-right: 40px; position: center;">Valor</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT * FROM contratos";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td style="padding: 40px; position: center;">'.$row_transacoes['contrato_id'] . "</td>";
		$html .= '<td style="padding-right: 70px; position: center;">'.$row_transacoes['titulo'] . "</td>";
        $html .= '<td style="padding-right: 40px; position: center;">'.$row_transacoes['numero'] . "</td>";
		$html .= '<td style="padding-right: 40px; position: center;">'.date('d-m-Y', strtotime($row_transacoes['inicio'])) . "</td>";
        $html .= '<td style="padding-right: 40px; position: center;">'.date('d-m-Y', strtotime($row_transacoes['vencimento'])) . "</td>";
		$html .= '<td style="padding-right: 40px; position: center;">'.$row_transacoes['valor'] . "</td></tr>";
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../plugins/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<hr/><img src="../dist/img/logo-menor.png" width="150px" style="top: -80px; left: -15px; padding-bottom: 10px"><h1 style="text-align: center; font-family: Sans-Serif; font-style: italic">Relatório de Vencimento de Contrato</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>