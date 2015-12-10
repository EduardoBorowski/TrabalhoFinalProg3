<?php
include_once("classes/restrito.class.php");
Restrito::verifica(array(1, 2, 3));

include_once("classes/pessoa.class.php");
$p = new Pessoa();
$professor = $p->selecionarProfessores();

include_once("classes/solicitacao.class.php");
if(isset($_POST['botao'])){
	$s = new Solicitacao();
	$s->setId_professor($_POST["nomeProf"]);
	$s->setId_solicitante($_SESSION['id_pessoa']);
	$s->setDia_saida($_POST['data']);
	$s->setHora_saida($_POST['horarioSaida']);
	$s->setHora_retorno($_POST['horarioRetorno']);
	$s->setTurma($_POST['turma']);
	$s->setNum_alunos($_POST['nroAlunos']);
	if($_POST['local'] == "animal"){
		$s->setFl_animal(true);
		$s->setFl_vegetal(false);
		$s->setFl_mecanizacao(false);
	}
	elseif($_POST['local'] == "vegetal"){
		$s->setFl_animal(false);
		$s->setFl_vegetal(true);
		$s->setFl_mecanizacao(false);
	}
	elseif($_POST['local'] == "mecanizacao"){
		$s->setFl_vegetal(false);
		$s->setFl_animal(false);
		$s->setFl_mecanizacao(true);
	}
	if($_POST['clima'] == "sim"){
		$s->setFl_clima(true);
	}
	else{
		$s->setFl_clima(false);
	}
	if($_POST['acomp'] == "sim"){
		$s->setFl_tecnico(true);
	}
	else{
		$s->setFl_tecnico(false);
	}
	$s->setMaterial($_POST['materiais']);
	$solicit = $s->inserir();
	if($_SESSION['restrito'] == 1){
		header("location: minhassolicitacoes.php");
	}
	else{
		header("location: todassolicitacoes.php");
	}
}
?>
<html>
	<head>
		<title>Nova Solicitação</title>
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
			<?php
			if($_SESSION['restrito'] == 1){
				echo "<li><a href='minhassolicitacoes.php'><span>Minhas Solicitações</span></a></li>";
				echo "<li class='active'><a href='novasolicitacao.php'><span>Nova Solicitação</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			} else {
				echo "<li><a href='todassolicitacoes.php'><span>Todas Solicitações</span></a></li>";
				echo "<li class='active'><a href='novasolicitacao.php'><span>Nova Solicitação</span></a></li>";
				//echo "<li><a href='relatorio.php'><span>Relatórios</span></a></li>";
				echo "<li><a href='listaprofessor.php'><span>Professores</span></a></li>";
				echo "<li><a href='configuracao.php'><span>Configurações</span></a></li>";
				echo "<li class='last'><a href='sair.php'><span>Fazer Logoff</span></a></li>";
			}
			?>
			</ul>
			</div>
			<h1>Nova Solicitação de Aula Prática</h1>
			<form name="form" onSubmit="return ValidaNovaSolic();" action="novasolicitacao.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><td>Data:</td><td><input type="date" name="data"></td></tr>
					<tr><td>Horário de Saída:</td><td><input type="time" name="horarioSaida" size="5" maxlength="5"></td></tr>
					<tr><td>Horário de Retorno:</td><td><input type="time" name="horarioRetorno" size="5" maxlength="5"></td></tr>
					<?php 
					if($_SESSION['restrito'] == 1){
						echo "<tr><td>Professor:</td><td><input type='hidden' name='nomeProf' value='".$_SESSION["id_pessoa"]."'>".$professor[0]['nome']."</td></tr>";
					}
					else {
						echo "<tr><td>Professor:</td><td><select name='nomeProf'>";
						echo "<option value=''>selecione...</option>";
						if(is_array($professor)){
							foreach($professor as $prof){
								echo "<option value='".$prof['id_pessoa']."'>".$prof['nome']."</option>";
							}
						}
						echo "</select>";
					}
					?>
					<tr><td>Turma:</td><td><input type="text" name="turma" size="50"></td></tr>
					<tr><td>Número de Alunos:</td><td><input type="number" name="nroAlunos" size="3" maxlength="3"></td></tr>
					<tr><td>Local:</td><td><input type="radio" name="local" value="animal">Produção Animal
						<input type="radio" name="local" value="vegetal">Produção Vegetal
						<input type="radio" name="local" value="mecanizacao">Mecanização</td></tr>
					<tr><td>Necessita de<br>acompanhamento técnico:</td><td>
						<input type="radio" name="acomp" value="sim">Sim
						<input type="radio" name="acomp" value="nao">Não</td></tr>
					<tr><td>Depende de condição<br>climática:</td><td>
						<input type="radio" name="clima" value="sim">Sim
						<input type="radio" name="clima" value="nao">Não</td></tr>
					<tr><td valign="top">Materias<br>Necessários:</td><td><textarea name="materiais" rows="6" cols="40"></textarea></td></tr>
					<tr><td><a href="javascript:history.back(1);">Voltar</a></td>
						<td><br><input type="submit" name="botao" class="botao" value="Enviar Solicitação"></td></tr>
				</table>
			</form>
		</div></div>
	</body>
</html>