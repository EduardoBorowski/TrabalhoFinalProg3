<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(2, 3));

include_once("classes/solicitacao.class.php");
if(isset($_GET["acao"]) && $_GET["acao"] == "cancela"){
	$s = new Solicitacao();
	$s->setId_solicitacao($_GET["id"]);
	$s->setId_cancelado($_SESSION["id_pessoa"]);
	$solicit = $s->deletarSolic();
	header("location: todassolicitacoes.php");
}
if(isset($_GET["acao"]) && $_GET["acao"] == "envia"){
	$s = new Solicitacao();
	$s->setId_solicitacao($_GET["id"]);
	$solicit = $s->enviarSolic();
	header("location: todassolicitacoes.php");
}
?>
<html>
	<head>
		<title>Todas Solicitações</title>
	</head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<body>
		<div id="barra_governo"><div class="barra"><ul>
		   <li><a title="Portal de Estado do Brasil" class="logo" href="http://www.brasil.gov.br/" target="_blank"></a></li>
		   <li><a title="Acesso &agrave; Informa&ccedil;&atilde;o" class="ai" href="http://www.acessoainformacao.gov.br/" target="_blank"></a></li></ul></div>
		</div>
		<a href="http://www.bento.ifrs.edu.br/" target="_blank"><img align="left" src="imagens/logo.jpg" width="150" height="75"></img></a>
		<div class="tela1">
		<div class="tela2">
			<div id='cssmenu'>
			<ul>
			   <li class='active'><a href='todassolicitacoes.php'><span>Todas Solicitações</span></a></li>
			   <li><a href='novasolicitacao.php'><span>Nova Solicitação</span></a></li>
			   <!--<li><a href='relatorio.php'><span>Relatórios</span></a></li>-->
			   <li><a href='listaprofessor.php'><span>Professores</span></a></li>
			   <li><a href='configuracao.php'><span>Configurações</span></a></li>
			   <li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>
			</ul>
			</div>
			<h1>Todas Solicitações</h1>
			<?php
			include_once("classes/solicitacao.class.php");
			$s = new Solicitacao();
			$solicit = $s->selecionarTodos();
			echo "<table border='1px'>";
			echo "<th>Data</th><th>Horário</th><th>Professor</th><th>Turma</th><th>Local</th><th>Status</th>";
			echo "<tr>";
			if(is_array($solicit)){
				foreach($solicit as $solic){
					$dia_solicitacao = date("m-d-Y", strtotime($solic["dia_solicitacao"]));
					$data = date("m-d-Y");
					if($data >= $dia_solicitacao){
						$dia_saida = date("d/m/Y", strtotime($solic["dia_saida"]));
						$hora_saida = date("H:i", strtotime($solic["hora_saida"]));
						$hora_retorno = date("H:i", strtotime($solic["hora_retorno"]));
						echo "<tr>";
						echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>".$dia_saida."</a></td>";
						echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>".$hora_saida." - ".$hora_retorno."</td>";
						echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>".$solic["nome"]."</a></td>";
						echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>".$solic["turma"]."</a></td>";
						if($solic["fl_animal"]){
							echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>Produção Animal</a></td>";
						}
						elseif($solic["fl_vegetal"]){
							echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>Produção Vegetal</a></td>";
						}
						elseif($solic["fl_mecanizacao"]){
							echo "<td><a href='detalhesrequisicao.php?acao=detalhes&id=".$solic["id_solicitacao"]."'>Mecanização</a></td>";
						}
						if(!is_null($solic["dia_aprovacao"])){
							echo "<td>Confirmado</td>";
						}
						elseif(!is_null($solic["dia_cancelado"])){
							echo "<td>Cancelado</td>";
						}
						else{
							echo "<td>Aguardando</td>";
						}
						echo "</tr>";
					}
				}
			}
			echo "</table>";
			?>
		</div></div>
	</body>
</html>