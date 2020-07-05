<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/usuariosDAO.php');
$v_usuario = new usuarios();
$usuDAO = new usuariosDAO();
$v_usuario->setNome($_POST['f_nome']);
$v_usuario->setEmail($_POST['f_mail']);
$v_usuario->setIdPerfil($_POST['perfil']);
$usuDAO->_construct($v_usuario);
$usuDAO->update($_POST['f_id']);
header("Location: cadastro.php");
?>