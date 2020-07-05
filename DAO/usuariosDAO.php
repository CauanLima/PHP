<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'].'/Classes/usuarios.php');
    require_once 'Crud.php';
    class usuariosDAO extends Crud{
        private $d_usuarios;
        protected $table = 'usuarios';
        public function _construct($p_usuarios){
            $this->d_usuarios = $p_usuarios;
        }
        private function _clone(){}
        public function _destruct(){
            foreach($this as $key => $value){
                unset($this->$key);
            }
            foreach(array_keys(get_defined_vars()) as $var){
                unset(${"$var"});
            }
            unset($var);
        } 
        public function insert(){
		$sql  = "INSERT INTO $this->table (nome, email, senha,id_perfil) VALUES ('".$this->d_usuarios->getNome()."', '".$this->d_usuarios->getEmail()."', '".$this->d_usuarios->getSenha()."', '".$this->d_usuarios->getIdPerfil()."')";
		$stmt = DB::prepare($sql);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET nome = '".$this->d_usuarios->getNome()."', email = '".$this->d_usuarios->getEmail()."', id_perfil = '".$this->d_usuarios->getIdPerfil()."' WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();	
	}
	public function login ($email, $senha){
	    $sql  = "Select * from $this->table where email = :email AND senha = :senha ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
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
	    $sql  = "UPDATE $this->table SET senha = '".$this->d_usuarios->getSenha()."' WHERE id = '".$this->d_usuarios->getId()."'";
	    $stmt = DB::prepare($sql);
	    return $stmt->execute();
	}
	public function load(){
            // Buscando todos os dados da tabela perfis
            $arr = $this->findAll();
            // Montando o array de objetos perfis
            foreach($arr as $chave => $valor){
                $objeto = new usuarios();
                $objeto->setId($valor->id);
                $objeto->setNome($valor->nome);
                $objeto->setEmail($valor->email);
                $objeto->setSenha($valor->senha);
                $objeto->setIdPerfil($valor->id_perfil);
                $arrusuarios[] = $objeto;
            }
            return $arrusuarios;
        }
    }    





?>