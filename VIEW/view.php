<?php
    if ($pagina == 'login'){
        Header("Location:https://projetophpfatec.000webhostapp.com/index.php");
    }else if ($pagina == 'logado'){
        Header("Location:https://projetophpfatec.000webhostapp.com/cadastro.php");
    }else if ($pagina == 'excluido'){
        Header("Location:https://projetophpfatec.000webhostapp.com/cadastro.php");
    }else if($pagina == 'atualizar'){
        Header("Location:https://projetophpfatec.000webhostapp.com/cadastro.php");
    }else if($pagina == 'incluir'){
        Header("Location:https://projetophpfatec.000webhostapp.com/cadastro.php");
    }else if($pagina == 'resetar'){
        Header("Location:https://projetophpfatec.000webhostapp.com/cadastro.php");
    }else if($pagina == 'resetarSenha'){
        Header("Location:https://projetophpfatec.000webhostapp.com/recadastrarSenha.php");
    }



?>