<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(1, 2, 3, 4, 5, 6, 7));
?>
<html>
	<head>
		<title>Cancela Solicita��o</title>
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
				echo "<li><a href='minhassolicitacoes.php'><span>Minhas Solicita��es</span></a></li>";
				echo "<li><a href='novasolicitacao.php'><span>Nova Solicita��o</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 2 || ($_SESSION['restrito'] == 3)) {
				echo "<li><a href='todassolicitacoes.php'><span>Todas Solicita��es</span></a></li>";
				echo "<li><a href='novasolicitacao.php'><span>Nova Solicita��o</span></a></li>";
				echo "<li><a href='relatorio.php'><span>Relat�rios</span></a></li>";
				echo "<li><a href='listaprofessor.php'><span>Professores</span></a></li>";
				echo "<li><a href='configuracao.php'><span>Configura��es</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 4){
				echo "<li><a href='requisicoestransporte.php'><span>Requisi��es Transporte</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 5){
				echo "<li><a href='requisicoesanimal.php'><span>Requisi��es Animal</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 6){
				echo "<li><a href='requisicoesvegetal.php'><span>Requisi��es Vegetal</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} elseif($_SESSION['restrito'] == 7){
				echo "<li><a href='requisicoesmecanizacao.php'><span>Requisi��es Mecaniza��o</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			}
			?>
			</ul>
			</div>
			<h1>Cancela Solicita��es</h1>
			<br><a href="javascript:history.back(1);">Voltar</a>
			<!--<a href="sair.php">Fazer Logoff</a>-->
		</div></div>
	</body>
</html>