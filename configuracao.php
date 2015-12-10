<?php
include_once("classes/restrito.class.php");
include_once("classes/pessoa.class.php");
Restrito::verifica(array(2, 3));

$p = new Pessoa();
if(isset($_POST['botao'])){
	if(isset($_FILES['logo'])){
		$p->uploadJpg($_FILES['logo'], "logo.jpg");
	}
	if(isset($_FILES['timbre'])){
		$p->uploadJpg($_FILES['timbre'], "timbre.jpg");
	}
	if(isset($_FILES['assinatura'])){
		$p->uploadJpg($_FILES['assinatura'], "assinatura.jpg");
	}
}

if(isset($_POST['botao'])){
	$pessoas = $p->selecionarTodos();
	if(is_array($pessoas)){
		foreach($pessoas as $pessoa){
			if($pessoa["tipo"] == "Diretor"){
				//$nome_diretor = $pessoa["nome"];
				$p->setId_pessoa($pessoa["id_pessoa"]);
				$p->setNome($_POST['nDiretor']);
				$p->setEmail($_POST['eDiretor']);
				$p->setSenha($_POST['sDiretor']);
				$p->alterar();
			}
			if($pessoa["tipo"] == "Coordenador"){
				$p->setId_pessoa($pessoa["id_pessoa"]);
				$p->setNome($_POST['nCoordenador']);
				$p->setEmail($_POST['eCoordenador']);
				$p->setSenha($_POST['sCoordenador']);
				$p->alterar();
			}
			if($pessoa["tipo"] == "Transporte"){
				$p->setId_pessoa($pessoa["id_pessoa"]);
				$p->setNome($_POST['nTransporte']);
				$p->setEmail($_POST['eTransporte']);
				$p->setSenha($_POST['sTransporte']);
				$p->alterar();
			}
			if($pessoa["tipo"] == "Animal"){
				$p->setId_pessoa($pessoa["id_pessoa"]);
				$p->setNome($_POST['nAnimal']);
				$p->setEmail($_POST['eAnimal']);
				$p->setSenha($_POST['sAnimal']);
				$p->alterar();
			}
			if($pessoa["tipo"] == "Vegetal"){
				$p->setId_pessoa($pessoa["id_pessoa"]);
				$p->setNome($_POST['nVegetal']);
				$p->setEmail($_POST['eVegetal']);
				$p->setSenha($_POST['sVegetal']);
				$p->alterar();
			}
			if($pessoa["tipo"] == "Mecanizacao"){
				$p->setId_pessoa($pessoa["id_pessoa"]);
				$p->setNome($_POST['nMecanizacao']);
				$p->setEmail($_POST['eMecanizacao']);
				$p->setSenha($_POST['sMecanizacao']);
				$p->alterar();
			}
		}
	}
	header("location: todassolicitacoes.php");
}
else{
	$pessoas = $p->selecionarTodos();
	if(is_array($pessoas)){
		foreach($pessoas as $pessoa){
			if($pessoa["tipo"] == "Diretor"){
				$nome_dire = $pessoa["nome"];
				$email_dire = $pessoa["email"];
			}
			if($pessoa["tipo"] == "Coordenador"){
				$nome_coord = $pessoa["nome"];
				$email_coord = $pessoa["email"];
			}
			if($pessoa["tipo"] == "Transporte"){
				$nome_tran = $pessoa["nome"];
				$email_tran = $pessoa["email"];
			}
			if($pessoa["tipo"] == "Animal"){
				$nome_ani = $pessoa["nome"];
				$email_ani = $pessoa["email"];
			}
			if($pessoa["tipo"] == "Vegetal"){
				$nome_veg = $pessoa["nome"];
				$email_veg = $pessoa["email"];
			}
			if($pessoa["tipo"] == "Mecanizacao"){
				$nome_mec = $pessoa["nome"];
				$email_mec = $pessoa["email"];
			}
		}
	}
}
?>
<html>
	<head>
		<title>Configurações</title>
	</head>
	<script src="valida.js"></script>
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
			   <li><a href='listaprofessor.php'><span>Professores</span></a></li>
			   <li class='active'><a href='configuracao.php'><span>Configurações</span></a></li>
			   <li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>
			</ul>
			</div>
			<h1>Configurações</h1>
			<form name="form" onSubmit="return ValidaConf();" action="configuracao.php" method="post" enctype="multipart/form-data">
				<fieldset style="width:500px">
					<legend>Imagens</legend>
					<table>
						<tr><td>Logo do sistema: </td><td><input type="file" name="logo"></td></tr>
						<tr><td>Timbre da requisição: </td><td><input type="file" name="timbre"></td></tr>
						<tr><td>Assinatura do diretor: </td><td><input type="file" name="assinatura"></td></tr>
					</table>
				</fieldset>
				<fieldset style="width:500px">
					<legend>Diretor</legend>
					<table>
						<tr><td>Nome: </td><td><input type="text" name="nDiretor" value="<?php echo $nome_dire;?>" size="59"></td></tr>
						<tr><td>E-mail: </td><td><input type="email" name="eDiretor" value="<?php echo $email_dire;?>" size="59"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="sDiretor" size="59"></td></tr>
					</table>
				</fieldset>
				<fieldset style="width:500px">
					<legend>Coordenador</legend>
					<table>
						<tr><td>Nome: </td><td><input type="text" name="nCoordenador" value="<?php echo $nome_coord;?>" size="59"></td></tr>
						<tr><td>E-mail: </td><td><input type="email" name="eCoordenador" value="<?php echo $email_coord;?>" size="59"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="sCoordenador" size="59"></td></tr>
					</table>
				</fieldset>
				<fieldset style="width:500px">
					<legend>Transporte</legend>
					<table>
						<tr><td>Nome: </td><td><input type="text" name="nTransporte" value="<?php echo $nome_tran;?>" size="59"></td></tr>
						<tr><td>E-mail: </td><td><input type="email" name="eTransporte" value="<?php echo $email_tran;?>" size="59"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="sTransporte" size="59"></td></tr>
					</table>
				</fieldset>
				<fieldset style="width:500px">
					<legend>Animal</legend>
					<table>
						<tr><td>Nome: </td><td><input type="text" name="nAnimal" value="<?php echo $nome_ani;?>" size="59"></td></tr>
						<tr><td>E-mail: </td><td><input type="email" name="eAnimal" value="<?php echo $email_ani;?>" size="59"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="sAnimal" size="59"></td></tr>
					</table>
				</fieldset>
				<fieldset style="width:500px">
					<legend>Vegetal</legend>
					<table>
						<tr><td>Nome: </td><td><input type="text" name="nVegetal" value="<?php echo $nome_veg;?>" size="59"></td></tr>
						<tr><td>E-mail: </td><td><input type="email" name="eVegetal" value="<?php echo $email_veg;?>" size="59"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="sVegetal" size="59"></td></tr>
					</table>
				</fieldset>
				<fieldset style="width:500px">
					<legend>Mecanização</legend>
					<table>
						<tr><td>Nome: </td><td><input type="text" name="nMecanizacao" value="<?php echo $nome_mec;?>" size="59"></td></tr>
						<tr><td>E-mail: </td><td><input type="email" name="eMecanizacao" value="<?php echo $email_mec;?>" size="59"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="sMecanizacao" size="59"></td></tr>
					</table>
				</fieldset>
				<br><input type="submit" name="botao" class="botao" value="Salvar Configurações">
				<a href="javascript:history.back(1);">Voltar</a>
			</form>
		</div></div>
	</body>
</html>