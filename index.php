<?php
include_once("classes/pessoa.class.php");
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<script src="valida.js"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<body>
		<div id="barra_governo"><div class="barra"><ul>
		   <li><a title="Portal de Estado do Brasil" class="logo" href="http://www.brasil.gov.br/" target="_blank"></a></li>
		   <li><a title="Acesso &agrave; Informa&ccedil;&atilde;o" class="ai" href="http://www.acessoainformacao.gov.br/" target="_blank"></a></li>
		   </ul></div>
		</div>
		<a href="http://www.bento.ifrs.edu.br/" target="_blank"><img align="left" src="imagens/logo.jpg" width="150" height="75"></img></a>
		<div class="tela1">
		<div class="tela2">
			<form name="form" onSubmit="return ValidaIndex();" action="verifica.php" method="post">
				<fieldset style="width:260px">
					<legend>Informe o seu e-mail e sua senha!</legend>
					<table>
						<tr><td>E-mail: </td><td><input type="email" name="email" value="<?php echo Pessoa::recuperaEmail(); ?>"></td></tr>
						<tr><td>Senha: </td><td><input type="password" name="senha"></td></tr>
						<tr><td></td><td><input type="submit" class="botao" name="botao" value="Fazer Login"></td></tr>
					</table>
				</fieldset>
			</form>
		</div></div>
	</body>
</html>