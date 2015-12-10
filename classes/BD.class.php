<?php
include_once("Config.inc.php");
//error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
class BD {
	private $conexao;

	public function __construct(){
		$this->conexao = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DBNAME);
		/*$this->conexao = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
		$banco = mysql_select_db(MYSQL_DBNAME, $this->conexao);*/
	}

	public function consultar($select){
		$query = mysqli_query($this->conexao, $select);
		$retorno = array();
		$dados =  array();
		while($retorno = mysqli_fetch_array($query)) {
			$dados[] = $retorno;
		}
		return $dados;
	}

	public function alterar($sql){
		$RetornoExecucao = mysqli_query($this->conexao, $sql);
		return $RetornoExecucao;
	}

	public function __destruct(){
		mysqli_close($this->conexao);
	}
}
?>