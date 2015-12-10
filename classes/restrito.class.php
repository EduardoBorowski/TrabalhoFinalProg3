<?php
session_start();

class Restrito{
	public static function verifica($tipo){
		// Verifica se a session existe, liberando o acesso
		if(!isset($_SESSION['restrito']) || !in_array($_SESSION['restrito'],$tipo)){
			header("location: sair.php");
		}
	}
}
?>