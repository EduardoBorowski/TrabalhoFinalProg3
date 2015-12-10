<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(2, 3));

include_once("classes/pessoa.class.php");
$p = new Pessoa();
$professor = $p->selecionarProfessores();
?>
<html>
	<head>
		<title>Lista Professor</title>
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
			   <li><a href='todassolicitacoes.php'><span>Todas Solicitações</span></a></li>
			   <li><a href='novasolicitacao.php'><span>Nova Solicitação</span></a></li>
			   <!--<li><a href='relatorio.php'><span>Relatórios</span></a></li>-->
			   <li class='active'><a href='listaprofessor.php'><span>Professores</span></a></li>
			   <li><a href='configuracao.php'><span>Configurações</span></a></li>
			   <li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>
			</ul>
			</div>
			<h1>Lista Professor</h1>
			<table border="1">
			<th>Nome do Professor</th>
			<?php
			if(is_array($professor)){
				foreach($professor as $prof){
					if(is_null($prof["dia_deletado"])){
						echo "<tr><td>".$prof["nome"]."</td>";
						echo "<td><a href='cadastroprofessor.php?acao=altera&id=".$prof["id_pessoa"]."'>Alterar dados</a></td>";
						echo "<td><a href='cadastroprofessor.php?acao=deleta&id=".$prof["id_pessoa"]."'>Excluir professor</a></td></tr>";
					}
				}
			}
			?>
			</table>
			<br><a href="cadastroprofessor.php?acao=insere">Cadastro de Professor</a><br><br>
			<a href="javascript:history.back(1);">Voltar</a>
			<!--<a href="sair.php">Fazer Logoff</a>-->
		</div></div>
	</body>
</html>