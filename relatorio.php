<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(2, 3, 4));

include_once("classes/solicitacao.class.php");
if(isset($_GET["acao"]) && $_GET["acao"] == "relatorio"){
	$s = new Solicitacao();
	$s->setId_solicitacao($_GET["id"]);
	$solicit = $s->selecionar();
}
if(is_array($solicit)){
	foreach($solicit as $solic){
		$dia_solicitado = date("d/m/Y", strtotime($solic["dia_solicitacao"]));
		$dia_saida = date("d/m/Y", strtotime($solic["dia_saida"]));
		$hora_saida = date("H:i", strtotime($solic["hora_saida"]));
		$hora_retorno = date("H:i", strtotime($solic["hora_retorno"]));
?>
<html>
	<head>
		<title>Relatório</title>
	</head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<body>
		<div id="barra_governo"><div class="barra"><ul>
		   <li><a title="Portal de Estado do Brasil" class="logo" href="http://www.brasil.gov.br/" target="_blank"></a></li>
		   <li><a title="Acesso &agrave; Informa&ccedil;&atilde;o" class="ai" href="http://www.acessoainformacao.gov.br/" target="_blank"></a></li></ul></div>
		</div>
		<div class="tela1">
		<div class="tela2">
		<p align="center">
			<img src="imagens/timbre.jpg" width="100" height="100"></img>
			<h2 align="center">SERVIÇO PÚBLICO FEDERAL</h2>
			<h2 align="center">MINISTÉRIO DA EDUCAÇÃO</h2>
			<h3 align="center">Secretaria de Educação Profissional e Tecnológica</h3>
			<h3 align="center">Instituto Federal de Educação, Ciência e Tecnologia - Câmpus Bento Gonçalves</h3>
		</p>
		<p>
			Da: <b>...</b><br>
			Ao: <b>...</b>
		</p>
		<p>
			<b>Finalidade: </b>...<br>
			<b>Roteiro: </b>...
		</p>
		<p>
			<table>
				<tr><td style="width:350px"><b>Data e Horário de saída: <?php echo $dia_saida;?></b></td><td><?php echo $hora_saida." horas";?></td></tr>
				<tr><td><b>Data e Horário de retorno: <?php echo $dia_saida;?></b></td><td><?php echo $hora_retorno." horas";?></td></tr>
				<tr><td><b>Solicitado: <?php echo $dia_solicitado;?></b></td>
			</table>
		</p>
		<p align="right">
			<img src="imagens/assinatura.jpg" width="150" height="50"></img><br>
			<b>Nome do Diretor</b><br>
			Setor ...
		</p>
		<p>
			<b>(Preenchimento a cargo de setor de transporte)</b><br>
			<font size="2pt">
				O setor de transporte autoriza com o guia nº _____ a saída do veículo __________ de placas __________ 
				com responsablidade do motorista ____________________ para que com a saída e retorno no(s) dia(s) e horas acima descritos
				se desloque do IFRS Câmpus Bento Gonçalves.
			</font>
		</p>
		<p align="right">
			<b>Nome do Transportes</b><br>
			Setor ...
		</p>
		<p>
			<!--<table border="1">
				<tr><td>SAÍDA</td><td>CHEGADA</td><td>Percorridos</td><td>Assinatura Motorista</td></tr>
			</table>-->
		</p>
		<p>
			<table>
				<tr><td style="width:400px">Professor: <?php echo $solic["nome"];?></td>
				<td style="width:400px">Turma: <?php echo $solic["turma"];?></td>
				<td style="width:400px">Nº de alunos: <?php echo $solic["num_alunos"];?></td></tr>
			</table>
		</p>
		<br><a href="javascript:history.back(1);">Voltar</a>
		<?php
		}}
		?>
		</div></div>
	</body>
</html>