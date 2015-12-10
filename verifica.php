<?php
session_start();
if(isset($_POST["botao"])){
	include_once("classes/pessoa.class.php");
	$pessoa = new Pessoa();
	$pessoa->setEmail($_POST['email']);
	$pessoa->setSenha($_POST['senha']);
	$pessoa->verificaLogin();
}
?>