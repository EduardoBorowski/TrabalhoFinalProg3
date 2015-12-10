<?php
include_once("BD.class.php");

class Solicitacao{
	
	private $id_solicitacao;
	private $id_solicitante;
	private $id_professor;
	private $id_cancelado;
	private $dia_solicitacao;
	private $dia_saida;
	private $hora_saida;
	private $hora_retorno;
	private $turma;
	private $num_alunos;
	private $fl_vegetal;
	private $fl_animal;
	private $fl_mecanizacao;
	private $fl_tecnico;
	private $fl_clima;
	private $material;
	private $dia_aprovacao;
	private $dia_cancelado;
	
	public function getId_solicitacao(){
		return $this->id_solicitacao;
	}
	public function setId_solicitacao($id_solicitacao){
		$this->id_solicitacao = $id_solicitacao;
	}
	
	public function getId_solicitante(){
		return $this->id_solicitante;
	}
	public function setId_solicitante($id_solicitante){
		$this->id_solicitante = $id_solicitante;
	}
	
	public function getId_professor(){
		return $this->id_professor;
	}
	public function setId_professor($id_professor){
		$this->id_professor = $id_professor;
	}
	
	public function getId_cancelado(){
		return $this->id_cancelado;
	}
	public function setId_cancelado($id_cancelado){
		$this->id_cancelado = $id_cancelado;
	}
	
	public function getDia_solicitacao(){
		return $this->dia_solicitacao;
	}
	public function setDia_solicitacao($dia_solicitacao){
		$this->dia_solicitacao = $dia_solicitacao;
	}
	
	public function getDia_saida(){
		return $this->dia_saida;
	}
	public function setDia_saida($dia_saida){
		$this->dia_saida = $dia_saida;
	}
	
	public function getHora_saida(){
		return $this->hora_saida;
	}
	public function setHora_saida($hora_saida){
		$this->hora_saida = $hora_saida;
	}
	
	public function getHora_retorno(){
		return $this->hora_retorno;
	}
	public function setHora_retorno($hora_retorno){
		$this->hora_retorno = $hora_retorno;
	}
	
	public function getTurma(){
		return $this->turma;
	}
	public function setTurma($turma){
		$this->turma = $turma;
	}
	
	public function getNum_alunos(){
		return $this->num_alunos;
	}
	public function setNum_alunos($num_alunos){
		$this->num_alunos = $num_alunos;
	}
	
	public function getFl_vegetal(){
		return $this->fl_vegetal;
	}
	public function setFl_vegetal($fl_vegetal){
		$this->fl_vegetal = $fl_vegetal;
	}
	
	public function getFl_animal(){
		return $this->fl_animal;
	}
	public function setFl_animal($fl_animal){
		$this->fl_animal = $fl_animal;
	}
	
	public function getFl_mecanizacao(){
		return $this->fl_mecanizacao;
	}
	public function setFl_mecanizacao($fl_mecanizacao){
		$this->fl_mecanizacao = $fl_mecanizacao;
	}
	
	public function getFl_tecnico(){
		return $this->fl_tecnico;
	}
	public function setFl_tecnico($fl_tecnico){
		$this->fl_tecnico = $fl_tecnico;
	}
	
	public function getFl_clima(){
		return $this->fl_clima;
	}
	public function setFl_clima($fl_clima){
		$this->fl_clima = $fl_clima;
	}
	
	public function getMaterial(){
		return $this->material;
	}
	public function setMaterial($material){
		$this->material = $material;
	}
	
	public function getDia_aprovacao(){
		return $this->dia_aprovacao;
	}
	public function setDia_aprovacao($dia_aprovacao){
		$this->dia_aprovacao = $dia_aprovacao;
	}
	
	public function getDia_cancelado(){
		return $this->dia_cancelado;
	}
	public function setDia_cancelado($dia_cancelado){
		$this->dia_cancelado = $dia_cancelado;
	}
	public function selecionarSolicProf(){
		$bd = new BD();
		return $bd->consultar("select s.*, p.* from solicitacao s, pessoa p where s.id_professor = p.id_pessoa and id_professor = ".$this->getId_professor()." order by dia_saida");
	}
	public function selecionar(){
		$bd = new BD();
		return $bd->consultar("select s.*, p.nome from solicitacao s, pessoa p where s.id_professor = p.id_pessoa and id_solicitacao = ".$this->getId_solicitacao()."");
	}
	public function selecionarTodos(){
		$bd = new BD();
		return $bd->consultar("select s.*, p.nome from solicitacao s, pessoa p where s.id_professor = p.id_pessoa order by dia_saida");
	}
	public function inserir(){
		$bd = new BD();
		$bd->alterar("insert into solicitacao (dia_solicitacao, id_solicitante, id_professor, dia_saida, hora_saida, hora_retorno, turma, num_alunos, fl_animal, fl_vegetal, fl_mecanizacao, fl_clima, fl_tecnico, material) values (now(),'".$this->getId_solicitante()."','".$this->getId_professor()."','".$this->getDia_saida()."','".$this->getHora_saida()."','".$this->getHora_retorno()."','".$this->getTurma()."','".$this->getNum_alunos()."','".$this->getFl_animal()."','".$this->getFl_vegetal()."','".$this->getFl_mecanizacao()."','".$this->getFl_clima()."','".$this->getFl_tecnico()."','".$this->getMaterial()."') ");
	}
	public function alterar(){
		$bd = new BD();
		$bd->alterar("update solicitacao set nome = '".$this->getNome()."', preco = '".$this->getPreco()."', tipo = '".$this->getTipo()."', marca = '".$this->getMarca()."' where id = '".$this->getId()."' ");
	}	
	public function deletarSolic(){
		$bd = new BD();
		$bd->alterar("update solicitacao set id_cancelado = '".$this->getId_cancelado()."', dia_cancelado = now() where id_solicitacao = '".$this->getId_solicitacao()."' ");
	}
	public function enviarSolic(){
		$bd = new BD();
		$bd->alterar("update solicitacao set dia_aprovacao = now() where id_solicitacao = '".$this->getId_solicitacao()."' ");
	}
	
}
?>