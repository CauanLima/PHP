<?php 
      require_once ($_SERVER['DOCUMENT_ROOT'].'/Classes/usuarios.php');
      require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/usuariosDAO.php');
      
session_start();
    unset($_SESSION['idUsuario']);
    unset($_SESSION['email']);
    $usuarios = new usuarios();
    
    if (isset($_POST['f_mail']) AND isset($_POST['f_senha'])){
        
        $usuarios->setEmail($_POST['f_mail']);
        $usuarios->setSenha($_POST['f_senha']);
        $usuariosDAO = new usuariosDAO();
        $usuariosDAO->_construct($usuarios);
        $resultado = $usuariosDAO->login($_POST['f_mail'], $usuarios->getSenha());
        if($resultado > 0){
            $_SESSION['idUsuario'] = $resultado;
            $_SESSION['email'] = $_POST['f_mail'];
            if ($_POST['f_senha'] == '123456'){
                Header("Location:recadastrarSenha.php");
            }else{
                Header("Location:cadastro.php");
            }
        }else{
           exibe_pagina('Redigite a senha!!!'); 
        }
        
    }else{
        exibe_pagina('');
    }
    
    
    function exibe_pagina($mensagem){
        
        echo "<html>";
        echo "<head>";
            echo "<meta http-equiv=Content-Type content=text/html; charset=UTF-8>";
		    echo "<title>Login</title>";
		    echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css>";
        echo "</head>";
        echo "<body style=background-color: #0CF>";
            echo "<div class=container>"; // Classe container
            echo "<div class=col-lg-4></div>"; // Classe de coluna
            echo "<div class=col-lg-4>"; // divide a tela em 4 partes
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "<div class=jumbotron >";
            if (isset($_GET['msg'])){
                echo "<h3>Realize o login antes de entrar na página de cadastro</h3>";
            }
            echo "<h3><p>$mensagem</p></h3>"; 
            echo "<form method=POST action=$_SERVER[PHP_SELF]>";
            
		    echo "<label>Email:</label>";
		    echo "<input class = form-control type=text name=f_mail>";
		    echo "<label>Senha:</label>";
		    echo "<input class = form-control type=password name=f_senha>";
		    echo "<center><input class = btn btn-outline-dark type=submit value=Login></center>";
		    echo "</form>";
		    echo "</div>";
		    echo "</div>"; //  fim da class 4 
		    echo "</div>"; // Fim da classe container
		
		echo "</body>";
		echo "</html>";
    }
    
?>