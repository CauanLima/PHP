<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/MODEL/modelUser.php');
    // Aqui ele faz o meio de campo sobre o que fazer
    session_start();
    $acao = $_POST['acao'];
    $modelUser = new modelUser();
    if ($acao == 'login' ){ // Realizar o login
         $retorno = $modelUser->loginSistema($_POST['f_mail'],$_POST['f_senha']);
         if ($retorno >= 1){
            if ($_POST['f_senha'] == '123456'){
                $_SESSION['idUsuario'] = $retorno;
                $_SESSION['email'] = $_POST['f_mail'];
                $pagina = 'resetarSenha';   
            }else{
                $pagina = 'logado';
            }
         }else{
             $pagina = 'login';
         }
         require_once ($_SERVER['DOCUMENT_ROOT'].'/VIEW/view.php');
    }else if ($acao == 'excluir'){
        $modelUser->excluir($_POST['f_id']);
        $pagina = 'excluido';
        require_once ($_SERVER['DOCUMENT_ROOT'].'/VIEW/view.php');
    }else if ($acao == 'incluir'){
        $modelUser->incluir($_POST['f_nome'],$_POST['f_mail'],$_POST['f_senha'],$_POST['perfil']);
        $pagina = 'incluir';
        require_once ($_SERVER['DOCUMENT_ROOT'].'/VIEW/view.php');
    }else if($acao=='resetar'){
        $modelUser->resetar($_POST['f_id']);
        $pagina = 'resetar';
        require_once ($_SERVER['DOCUMENT_ROOT'].'/VIEW/view.php');
    }else if($acao == 'atualizar'){
        $modelUser->alterar($_POST['f_nome'],$_POST['f_mail'],$_POST['perfil'], $_POST['f_id']);
        $pagina = 'atualizar';
        require_once ($_SERVER['DOCUMENT_ROOT'].'/VIEW/view.php');
    }else if($acao == 'novaSenha' ){
        $modelUser->resetarSenha($_POST['f_id'], $_POST['f_senha']);
        $pagina = 'login';
        require_once ($_SERVER['DOCUMENT_ROOT'].'/VIEW/view.php');
    }  
?>