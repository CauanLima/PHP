<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/Classes/usuarios.php');
    require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/usuariosDAO.php');
class modelUser{
    public function loginSistema($email, $senha){
        $usuarios = new usuarios();
        $usuarios->setEmail($email);
        $usuarios->setSenha($senha);
        $usuariosDAO = new usuariosDAO();
        $usuariosDAO->_construct($usuarios);
        $resultado = $usuariosDAO->login($email, $usuarios->getSenha());
        return $resultado;
    }
    public function excluir($id){
        $usuariosDAO = new usuariosDAO();
	    $usuariosDAO->delete($id);
    } 
    public function incluir($nome, $email, $senha, $perfil){
        $usuarios = new usuarios();
        $usuarios->setNome($nome);
		$usuarios->setEmail($email);
		$usuarios->setSenha($senha);
		$usuarios->setIdPerfil($perfil);
		$usuariosDAO = new usuariosDAO();
		$usuariosDAO->_construct($usuarios);
		$usuariosDAO->insert();
    }
    public function resetar($id){
        $usuariosDAO = new usuariosDAO();
        $usuarios = new usuarios();
        $usuarios->setId($id);
		$usuarios->setSenha('123456');
		$usuariosDAO->_construct($usuarios);
		$usuariosDAO->resetSenha();
    }
    public function alterar($nome,$email, $perfil, $id){
        $usuariosDAO = new usuariosDAO();
        $usuarios = new usuarios();
        $usuarios->setNome($nome);
        $usuarios->setEmail($email);
        $usuarios->setIdPerfil($perfil);
        $usuariosDAO->_construct($usuarios);
        $usuariosDAO->update($id);
    }
    public function resetarSenha($id, $senha){
        $usuariosDAO = new usuariosDAO();
        $usuarios = new usuarios();
        $usuarios->setId($id);
		$usuarios->setSenha($senha);
		$usuariosDAO->_construct($usuarios);
		$usuariosDAO->resetSenha();
    }
}
?>