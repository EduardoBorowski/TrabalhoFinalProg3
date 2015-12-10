<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(2, 3));

include_once("classes/pessoa.class.php");
if(isset($_GET["acao"]) && $_GET["acao"] == "altera"){
	$p = new Pessoa();
	$p->setId_pessoa($_GET["id"]);
	$professor = $p->selecionar();
}
elseif(isset($_GET["acao"]) && $_GET["acao"] == "deleta"){
	$p = new Pessoa();
	$p->setId_pessoa($_GET['id']);
	$professor = $p->deletarProfessor();
	header("location: listaprofessor.php");
}
elseif(isset($_POST["acao"]) && $_POST["acao"] == "insere"){
	$p = new Pessoa();
	$p->setNome($_POST['nome']);
	$p->setEmail($_POST['email']);
	$p->setSenha($_POST['senha']);
	$p->setTipo("Professor");
	$professor = $p->inserir();
	header("location: listaprofessor.php");
}
elseif(isset($_POST["acao"]) && $_POST["acao"] == "altera"){
	$p = new Pessoa();
	$p->setId_pessoa($_POST['id']);
	$p->setNome($_POST['nome']);
	$p->setEmail($_POST['email']);
	$p->setSenha($_POST['senha']);
	$professor = $p->alterar();
	header("location: listaprofessor.php");
}
?>
<html>
	<head>
		<title>Cadastro Professor</title>
	</head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="valida.js"></script>
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
			   <li><a href='listaprofessor.php'><span>Professores</span></a></li>
			   <li><a href='configuracao.php'><span>Configurações</span></a></li>
			   <li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>
			</ul>
			</div>
			<h1>Cadastro Professor</h1>
			<form name="form" onSubmit="return ValidaCadProf();" action="cadastroprofessor.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="acao" value="<?php if(isset($_GET["acao"])) { echo $_GET["acao"]; }?>">
				<input type="hidden" name="id" value="<?php if(isset($professor[0]["id_pessoa"])) { echo $professor[0]["id_pessoa"]; }?>">
				<table>
					<tr><td>Nome:</td><td><input type="text" name="nome" size="30" value="<?php if(isset($professor[0]["nome"])) { echo $professor[0]["nome"]; }?>"></td></tr>
					<tr><td>E-mail:</td><td><input type="email" name="email" size="30" value="<?php if(isset($professor[0]["email"])) { echo $professor[0]["email"]; }?>"></td></tr>
					<tr><td>Senha: </td><td><input type="password" name="senha" size="30" value="<?php if(isset($professor[0]["senha"])) { echo $professor[0]["senha"]; }?>"></td></tr>
					<tr><td><a href="javascript:history.back(1);">Voltar</a></td>
						<td><br><input type="submit" name="botao" class="botao" value="Cadastrar Professor"></td></tr>
				</table>
			</form>
		</div></div>
	</body>
</html>