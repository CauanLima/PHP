<?php
include "usuarios.php";
$v_usuario = new usuarios();
$v_usuario->setNome($_POST['f_nome']);
$v_usuario->setEmail($_POST['f_mail']);
$v_usuario->update($_POST['f_id']);
header("Location: cadastro.php");
?>