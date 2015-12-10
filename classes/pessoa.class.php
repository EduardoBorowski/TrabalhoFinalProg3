<?php
include_once("BD.class.php");

class Pessoa{
	
	private $id_pessoa;
	private $nome;
	private $email;
	private $senha;
	private $tipo;
	//private $dia_deletado;
	
	public function getId_pessoa(){
		return $this->id_pessoa;
	}
	public function setId_pessoa($id_pessoa){
		$this->id_pessoa = $id_pessoa;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getDia_deletado(){
		return $this->dia_deletado;
	}
	public function setDia_deletado($dia_deletado){
		$this->dia_deletado = $dia_deletado;
	}
	public static function recuperaEmail(){
		if(isset($_COOKIE['email']))
			return $_COOKIE['email'];
		return "";
	}
	public function uploadJpg($arquivo, $nome){
		echo $arquivo['type'];
		if($arquivo['type'] == "image/jpeg"){
			move_uploaded_file($arquivo["tmp_name"], "imagens/".$nome);
			header("location: configuracao.php");
		}
	}
	public function verificaLogin(){
		$bd = new BD();
		$pessoa = $bd->consultar("select * from pessoa where email = '".$this->getEmail()."' and senha = '".$this->getSenha()."'");
		$solic = $bd->consultar("select * from solicitacao");
		if(isset($pessoa) && is_array($pessoa)){
			if(is_null($pessoa[0]['dia_deletado'])){
				if($pessoa[0]['tipo'] == "Professor"){
					$_SESSION['id_pessoa'] = $pessoa[0]['id_pessoa'];
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 1;
					setcookie('email', $this->getEmail());
					header("location: minhassolicitacoes.php?acao=prof");
				}
				elseif($pessoa[0]['tipo'] == "Coordenador"){
					$_SESSION['id_pessoa'] = $pessoa[0]['id_pessoa'];
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 2;
					setcookie('email', $this->getEmail());
					header("location: todassolicitacoes.php");
				}
				elseif($pessoa[0]['tipo'] == "Diretor"){
					$_SESSION['id_pessoa'] = $pessoa[0]['id_pessoa'];
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 3;
					setcookie('email', $this->getEmail());
					header("location: todassolicitacoes.php");
				}
				elseif($pessoa[0]['tipo'] == "Transporte"){
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 4;
					setcookie('email', $this->getEmail());
					header("location: requisicoestransporte.php");
				}
				elseif($pessoa[0]['tipo'] == "Animal"){
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 5;
					setcookie('email', $this->getEmail());
					header("location: requisicoesanimal.php");
				}
				elseif($pessoa[0]['tipo'] == "Vegetal"){
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 6;
					setcookie('email', $this->getEmail());
					header("location: requisicoesvegetal.php");
				}
				elseif($pessoa[0]['tipo'] == "Mecanizacao"){
					// Cria a session para restringir o acesso
					$_SESSION['restrito'] = 7;
					setcookie('email', $this->getEmail());
					header("location: requisicoesmecanizacao.php");
				}
			}
			else {
				header("location: erro.php");
			}
		}
	}
	public function logout(){
		// Limpa a session, impossibilitando acessos indevidos
		unset($_SESSION['restrito']);
		header("location: index.php");
	}
	public function selecionarTodos(){
		$bd = new BD();
		return $bd->consultar("select * from pessoa");
	}
	public function selecionar(){
		$bd = new BD();
		return $bd->consultar("select * from pessoa where id_pessoa = '".$this->getId_pessoa()."' and tipo = 'Professor'");
	}
	public function selecionarProfessores(){
		$bd = new BD();
		return $bd->consultar("select * from pessoa where tipo = 'Professor' order by nome");
	}
	public function inserir(){
		$bd = new BD();
		$bd->alterar("insert into pessoa (nome, email, senha, tipo) values ('".$this->getNome()."','".$this->getEmail()."','".$this->getSenha()."','".$this->getTipo()."') ");
	}
	public function alterar(){
		$bd = new BD();
		$bd->alterar("update pessoa set nome = '".$this->getNome()."', email = '".$this->getEmail()."', senha = '".$this->getSenha()."' where id_pessoa = '".$this->getId_pessoa()."' ");
	}	
	public function deletarProfessor(){
		$bd = new BD();
		$bd->alterar("update pessoa set dia_deletado = now() where id_pessoa = '".$this->getId_pessoa()."' ");
	}
	
}
?>