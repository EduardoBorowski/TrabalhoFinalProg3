<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(1, 2, 3, 4, 5, 6, 7));

include_once("classes/solicitacao.class.php");
if(isset($_GET["acao"]) && $_GET["acao"] == "detalhes"){
	$s = new Solicitacao();
	$s->setId_solicitacao($_GET["id"]);
	$solicit = $s->selecionar();
}

?>
<html>
	<head>
		<title>Informações da Solicitação</title>
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
			<?php
			if($_SESSION['restrito'] == 1){
				echo "<li><a href='minhassolicitacoes.php'><span>Minhas Solicitações</span></a></li>";
				echo "<li><a href='novasolicitacao.php'><span>Nova Solicitação</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 2 || ($_SESSION['restrito'] == 3)) {
				echo "<li><a href='todassolicitacoes.php'><span>Todas Solicitações</span></a></li>";
				echo "<li><a href='novasolicitacao.php'><span>Nova Solicitação</span></a></li>";
				//echo "<li><a href='relatorio.php'><span>Relatórios</span></a></li>";
				echo "<li><a href='listaprofessor.php'><span>Professores</span></a></li>";
				echo "<li><a href='configuracao.php'><span>Configurações</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 4){
				echo "<li><a href='requisicoestransporte.php'><span>Requisições Transporte</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 5){
				echo "<li><a href='requisicoesanimal.php'><span>Requisições Animal</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 6){
				echo "<li><a href='requisicoesvegetal.php'><span>Requisições Vegetal</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 7){
				echo "<li><a href='requisicoesmecanizacao.php'><span>Requisições Mecanização</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			}
			?>
			</ul>
			</div>
			<h1>Informações da Solicitação</h1>
			<table>
			<?php
			if(is_array($solicit)){
				foreach($solicit as $solic){
					$dia_solicitado = date("d/m/Y", strtotime($solic["dia_solicitacao"]));
					$dia_saida = date("d/m/Y", strtotime($solic["dia_saida"]));
					$hora_saida = date("H:i", strtotime($solic["hora_saida"]));
					$hora_retorno = date("H:i", strtotime($solic["hora_retorno"]));
					echo "<h4><i>Solicitado em: ".$dia_solicitado."</i></h4>";
					echo "<tr><td>Data:</td><td><strong>".$dia_saida."</strong></td></tr>";
					echo "<tr><td>Horário de Saída:</td><td><strong>".$hora_saida."</strong></td></tr>";
					echo "<tr><td>Horário de Retorno:</td><td><strong>".$hora_retorno."</strong></td></tr>";
					echo "<tr><td>Nome do Professor:</td><td><strong>".$solic["nome"]."</strong></td></tr>";
					echo "<tr><td>Turma:</td><td><strong>".$solic["turma"]."</strong></td></tr>";
					echo "<tr><td>Número de Alunos:</td><td><strong>".$solic["num_alunos"]."</strong></td></tr>";
					echo "<tr><td>Local:</td>";
					if($solic["fl_animal"]){
						echo "<td><strong>Produção Animal</strong></td></tr>";
					}
					elseif($solic["fl_vegetal"]){
						echo "<td><strong>Produção Vegetal</strong></td></tr>";
					}
					elseif($solic["fl_mecanizacao"]){
						echo "<td><strong>Mecanização</strong></td></tr>";
					}
					echo "<tr><td>Necessita de<br>acompanhamento técnico:</td>";
					if($solic["fl_tecnico"]){
						echo "<td><strong>Sim</strong></td></tr>";
					}
					else{
						echo "<td><strong>Não</strong></td></tr>";
					}
					echo "<tr><td>Depende de condição<br>climática:</td>";
					if($solic["fl_clima"]){
						echo "<td><strong>Sim</strong></td></tr>";
					}
					else{
						echo "<td><strong>Não</strong></td></tr>";
					}
					echo "<tr><td valign='top'>Materias<br>Necessários:</td><td><strong>".$solic["material"]."</strong></td></tr>";
					if($_SESSION['restrito'] < 4){
						echo "<td></td><td><a href='todassolicitacoes.php?acao=cancela&id=".$solic["id_solicitacao"]."'>Cancelar Solicitação</a></td>";
					}
					if(($_SESSION['restrito'] <= 4) && ($_SESSION['restrito'] > 1)){
						if(!is_null($solic["dia_aprovacao"])){
							echo "<td></td><td><a href='relatorio.php?acao=relatorio&id=".$solic["id_solicitacao"]."'>Visualizar Solicitação</a></td>";
						}
						else{
							if(($_SESSION['restrito'] < 4) && ($_SESSION['restrito'] > 1)){
								echo "<td></td><td><a href='todassolicitacoes.php?acao=envia&id=".$solic["id_solicitacao"]."'>Enviar Solicitação</a></td>";
							}
						}
					}
					echo "</tr>";
				}
			}
			echo "<tr><td><a href='javascript:history.back(1);'>Voltar</a></td></tr>";
			
			?>
			</table>
		</div></div>
	</body>
</html>