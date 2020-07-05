<?php

class usuarios{
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $idPerfil;
	public function getId(){
		return $this->id;
	}
	public function getIdPerfil(){
	    return $this->idPerfil;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	public function setIdPerfil($idPerfil){
	    $this->idPerfil = $idPerfil;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function setSenha($senha){
		$this->senha = md5($senha);
	}
	
}

?>