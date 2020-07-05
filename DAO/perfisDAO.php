<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/Classes/perfis.php');
require_once 'Crud.php';

class PerfisDAO extends Crud{
    private $d_perfil;
	protected $table = 'perfis';
	public function _construct(){
	    
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
		$sql  = "INSERT INTO $this->table (nome) VALUES ('". $this->$d_perfil->nome ."'/'.)";
		$stmt = DB::prepare($sql);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();	
	}
	public function buscarNome($id){
	    $sql  = "Select * from $this->table where id =:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute(); 
		$logins = $stmt->fetchAll(); 
		foreach($logins as $key=>$value):
            if ($value->id > 0){
                return $value->nome;   
            }else{
                return 0;
            }             
        endforeach;
	}
	 public function load(){
            // Buscando todos os dados da tabela perfis
            $arr = $this->findAll();
            // Montando o array de objetos perfis
            foreach($arr as $chave => $valor){
                $objeto = new perfis();
                $objeto->setId($valor->id);
                $objeto->setNome($valor->nome);
                $arrPerfis[] = $objeto;
            }
            return $arrPerfis;
        }
	
}

?>