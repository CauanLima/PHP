<?php
require_once 'Crud.php';

class usuarios extends Crud{
	protected $table = 'usuarios';
	private $id;
	private $nome;
	private $email;
	private $senha;
	
	public function getId(){
		return $this->id;
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
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function setSenha($senha){
		$this->senha = md5($senha);
	}
	
	public function insert(){
		$sql  = "INSERT INTO $this->table (nome, email, senha) VALUES (:nome, :email, :senha)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, email = :email WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();	
	}
	public function login (){
	    $sql  = "Select * from $this->table where email =:email AND senha = :senha";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->execute(); 
		$logins = $stmt->fetchAll(); 
		foreach($logins as $key=>$value):
            if ($value->id > 0){
                return $value->id;   
            }else{
                return 0;
            }             
        endforeach;
	}
	public function RecuperariD(){
	    $sql  = "Select * from $this->table where email =:email AND senha = :senha";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->execute(); 
		return $stmt->fetchAll();
	}
	public function resetSenha(){
	    $sql  = "UPDATE $this->table SET  senha = :senha WHERE id = :id";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(':senha', $this->senha);
	    $stmt->bindParam(':id', $this->id);
	    return $stmt->execute();
	}
}

?>